@extends('homelayout.master')
@section('content')
    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="row">
            @include('homelayout.userinfomenu')

            <div class="col-lg-8">
                <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Date Purchased</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                        </thead>
                        @foreach($orders as $order)
                            <tbody>
                            <tr>
                                <td >
                                    <a class="navi-link" href="#" data-toggle="modal"
                                       style="color: #0b76cc" data-target="#orderDetails{{$order['id']}}">
                                        {{$order->order_id}}
                                    </a>
                                </td>
                                <td>{{$order->created_at}}</td>
                                <td><span class="text-danger">
                                    {{$order->status}}
                                </span></td>
                                <td><span>${{$order->totalPrice}}</span></td>
                                <td style="margin: 0px auto; display: block;">
                                    <div class="btn-group" style="margin: auto; display: block">
                                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Primary</button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 46px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another Action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            <div class="modal fade" id="orderDetails{{$order['id']}}" tabindex="-1" role="dialog" style="display: none;">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Order No - {{$order->order_id}}</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                                    aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row pb-3">
                                                <div class="col-9">Product Name</div>
                                                <div class="text-center col-3">Subtotal</div>
                                            </div>
                                            <hr>
                                            @foreach($order->orderList as $value)
                                                <div class="row pt-3">
                                                    <div class="col-9 shopping-cart">
                                                        <div class="product-item">
                                                            <a class="product-thumb" href="#">
                                                                <img src="{{$value->goods->images[0]}}" alt="Product">
                                                            </a>
                                                            <div class="product-info">
                                                                <h4 class="product-title">
                                                                    <a href="javascript:;">
                                                                        {{$value->goods->gname}}
                                                                        <small> x{{$value->num}}</small>
                                                                    </a>
                                                                </h4>
                                                                <div class="float-left">
                                                                    @foreach($value->product->getProductAttr()['father'] as $item)
                                                                        <span><em> {{$item['aname']}} :&nbsp;</em></span>
                                                                    @endforeach
                                                                </div>


                                                                <div class="float-left">

                                                                    @foreach($value->product->getProductAttr()['son'] as $item)
                                                                        <span><em>{{$item['aname']}}</em></span>
                                                                    @endforeach
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center text-lg col-3">${{($value->goods->price + $value->product->addPrice) * $value->num}}</div>
                                                </div>
                                                <hr>
                                            @endforeach


                                        </div>
                                        <div class="modal-footer border-0">
                                            {{--<button class="btn btn-primary btn-sm" type="button"></button>--}}
                                            <div class="text-secondary pr-4 ">Subtotal: ${{$order['totalPrice']}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </table>
                </div>
                <hr>
            </div>

            <div class="modal fade" id="orderDetails" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Order No - 34VB5540K83</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive shopping-cart mb-0">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th class="text-center">Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <tr>
                                        <td>
                                            <div class="product-item"><a class="product-thumb" href="shop-single.html"><img
                                                        src="img/shop/cart/01.jpg" alt="Product"></a>
                                                <div class="product-info">
                                                    <h4 class="product-title"><a href="shop-single.html">Canon EOS M50 Mirrorless Camera
                                                            <small>x 1</small>
                                                        </a></h4>
                                                    <span><em>Type:</em> Mirrorless</span><span><em>Color:</em> Black</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center text-lg">$910.00</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <hr class="mb-3">

                            <div class="d-flex flex-wrap justify-content-between align-items-center pb-2">
                                <div class="row  col-12">
                                    <div class="col-sm-9">
                                        <h5>Shipping to:</h5>
                                        <ul class="list-unstyled">
                                            {{--@if($address->company)--}}
                                            <li><span class="text-muted">Company:&nbsp; </span></li>
                                            {{--@endif--}}
                                            <li><span class="text-muted">Address:&nbsp; </span></li>
                                            <li><span class="text-muted">Country:&nbsp; </span></li>
                                            <li><span class="text-muted">Phone:&nbsp; </span></li>

                                        </ul>
                                    </div>
                                    <div class="text-lg px-2 py-1 col-sm-3">
                                        <span class="text-muted">Total:</span>
                                        <span class="text-gray-dark">$2,584.72</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
