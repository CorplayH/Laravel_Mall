<?php

namespace App\Http\Controllers\Order;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Goods;
use App\Models\GoodsAttribute;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except('notify');
    }
    
    //
    public function index()
    {
        //        $arr        = explode(',', $ids);
        //        $cart       = Cart::whereIn('id', $arr)->get();
        $addresses = Address::where('user_id', auth()->user()->id)->orderBy('is_default', 'desc')->get();
        
        return view('home.order.order', compact('addresses'));
    }
    
    /**
     * Check out review
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function review()
    {
        $ids        = '';
        $totalPrice = 0;
        $cartList   = $this->getOrderData();
        foreach ($cartList as $k => $value) {
            $ids                       .= $value['id'].',';
            $totalPrice                += $value['unitTotal'];
            $cartList[$k]['unitTotal'] = number_format((float)$value['unitTotal'], 2, '.', ',');
        }
        $ids        = rtrim($ids, ',');
        $address    = Address::where('user_id', auth()->user()->id)->where('is_default', 1)->first();
        $totalPrice = number_format((float)$totalPrice, 2, '.', ',');
        
        return view('home.order.orderReview', compact('cartList', 'ids', 'totalPrice', 'address'));
    }
    
    /**
     * 生成订单
     */
    public function storeOrder()
    {
        //生成地址ID
        $addressId = Address::where('user_id', auth()->user()->id)->where('is_default', 1)->value('id');
        $userId    = auth()->user()->id;
        $orderId   = 'IV'.str_pad(Order::count() + 1, 7, 0, STR_PAD_LEFT);
        // 定义cart ids, 代表这个订单里买了记住货品(cart可以查到 goods 和products)
        $ids = '';
        // 定义总价
        $totalPrice = 0;
        $cartList   = $this->getOrderData();
        // 生成cart ids, 和总价 代表这个订单里买了记住货品(cart可以查到 goods 和products)
        foreach ($cartList as $value) {
            $ids        .= $value['id'].',';
            $totalPrice += $value['unitTotal'];
        }
        $ids = rtrim($ids, ',');
        // 创建订单
        $order = Order::create([
            'order_id'   => $orderId,
            'user_id'    => $userId,
            'address_id' => $addressId,
            'status'     => 0,
            'totalPrice' => $totalPrice,
        
        ]);
        // 订单列表创建数据
        foreach (explode(',', $ids) as $v) {
            $cart = Cart::find($v);
            OrderList::create([
                'order_id'   => $order->id,
                'goods_id'   => $cart['goods_id'],
                'product_id' => $cart['product_id'],
                'num'        => $cart['num'],
            ]);
        }
        //          当创建订单之后, 要减少相应的库存
        foreach (explode(',', $ids) as $id) {
            $soldCart = Cart::find($id);
            $product  = Product::find($soldCart['product_id']);
            $product->update(['stock' => $product['stock'] - $cart['num']]);
            Cart::destroy($id);
        }
        
        return redirect()->route('order.pay', $order);
    }
    
    /**
     * Payment function
     *
     * @param \App\Models\Order $order
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pay(Order $order)
    {
        require_once public_path('org/wechatPay/lib/WxPay.Api.php');
        require_once public_path('org/wechatPay/example/WxPay.NativePay.php');
        $notify = new \NativePay();
        
        //模式二
        /**
         * 流程：
         * 1、调用统一下单，取得code_url，生成二维码
         * 2、用户扫描二维码，进行支付
         * 3、支付完成之后，微信服务器会通知支付成功
         * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
         */
        $input = new \WxPayUnifiedOrder();
        $input->SetBody("TodayMall");// 支付上面的名字
        $input->SetAttach($order['order_id']);
        $input->SetOut_trade_no($order['order_id']);
        $input->SetTotal_fee("1");// 单位 分
//                $input->SetTime_start(date("YmdHis"));
//                $input->SetTime_expire(date("YmdHis", time() + 600));
        //        $input->SetGoods_tag("test");
        //记住加 csrf 白名单 -> 指向 web 路由
        $input->SetNotify_url(asset('wechatPay/notify'));// 微信支付路由
        $input->SetTrade_type("NATIVE");
        $input->SetProduct_id("123456789");
        $result = $notify->GetPayUrl($input);
        $url2   = $result["code_url"];
        return view('home.order.pay', compact('url2', 'order'));
    }
    
    public function notify()
    {
//        file_put_contents('abc.php','aaa');
//         获取数据流
        $xml = file_get_contents('php://input');
        if ($xml) {
            //          先把获取到的XML数据转成 PHP对象
            $data = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
            //            写入$xml 数据到文件
            file_put_contents('data.php', var_export($data, true));
            if ($data->result_code == 'SUCCESS' && $data->return_code == 'SUCCESS') {
                $orderId = $data->attach;
                Order::where('order_id', $orderId)->update(['status' => 1]);
                // 最后我们需要给微信服务器一个响应,代表着我们接收到了它发来的消息
                $returnXml = '<xml>
    <return_code><![CDATA[SUCCESS]]></return_code>
    <return_msg><![CDATA[OK]]></return_msg>
    </xml>';
                return $returnXml;
            }
        }
    }
    
    public function checkStatus($orderId)
    {
        $order = Order::where('id', $orderId)->first();
        //        dd($order);
        if ($order['status']) {
            return ['valid' => 1, 'message' => 'Order Paid'];
        } else {
            return ['valid' => 0, 'message' => 'Pay failed'];
        }
    }
    
    public function isPaid($order)
    {
        return view('home.order.complete', compact('order'));
    }
    
    public function showOrder()
    {
        $orders = Order::where('user_id', auth()->id())->get();
        
        return view('home.order.showOrder', compact('orders'));
    }
    
    public function getOrderData()
    {
        $cartList = Cart::where('user_id', auth()->user()->id)->with('goods', 'product')->get();
        if ($cartList) {
            foreach ($cartList as $v) {
                $goods   = $v['goods']['price'];
                $product = $v['product']['addPrice'];
                //自定义一个单价属性
                $v['unitPrice'] = $goods + $product;
                $v['unitTotal'] += round(($goods + $product) * $v['num']);
                //            开始循环 货品的 属性
                foreach ($v['product']['attrs'] as $attr) {
                    //                找到货品的属性名字  作为数组的值
                    $attrName = GoodsAttribute::where('id', $attr)->value('aname');
                    //                找到货品属性的顶级属性
                    $pid     = GoodsAttribute::where('id', $attr)->value('pid');
                    $topAttr = GoodsAttribute::where('id', $pid)->value('aname');
                    //                组合数组
                    //                $attrs [] =[$topAttr=>$attrName];
                    $attrs['topAttr'][]  = $topAttr;
                    $attrs['attrName'][] = $attrName;
                }
                // 把循环出来的属性插入大数组
                $v['attrs'] = $attrs;
                //            清空上一次 循环出来的属性, 保证下次循环是属性是空的
                $attrs = [];
            }
        }
        
        return $cartList;
    }
}
