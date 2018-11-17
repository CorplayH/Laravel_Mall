@extends('homelayout.master')
@section('content')
    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="row">
            <!-- Checkout Adress-->
            <div class="col-xl-12 col-lg-12">
                <div class="steps flex-sm-nowrap mb-5">
                    <a class="step" href="javacript:;">
                        <h4 class="step-title"><i class="icon-check-circle"></i>1. Address</h4>
                    </a>
                    <a class="step" href="javacript:;">
                        <h4 class="step-title"><i class="icon-check-circle"></i>2. Review</h4>
                    </a>
                    <a class="step active" href="javascript:;">
                        <h4 class="step-title">3. Payment</h4>
                    </a>
                </div>

                <div class="col-lg-12 col-md-12 order-md-2">
                    <h6 class="text-muted text-lg text-uppercase">Payment Method</h6>
                    <hr class="margin-bottom-1x">
                    <div class="accordion" id="accordion1" role="tablist">
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h6><a href="#collapseOne" data-toggle="collapse"><i class="icon-globe"></i>Pay With WeChat :)</a></h6>
                            </div>
                            <div class="collapse show" id="collapseOne" data-parent="#accordion1" role="tabpanel">
                                <div class="card-body text-center">
                                    <div>Scan this code with your WeChat and done with pay!</div>
                                    <div>Order No.: {{$order->order_id}}</div>
                                    <div>Amount: ${{$order->totalPrice}}</div>

                                    <img alt="Scan to pay" src="/org/wechatPay/example/qrcode.php?data=<?php echo urlencode($url2);?>"
                                         style="width:200px;height:200px;"/>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h6><a class="collapsed" href="#collapseTwo" data-toggle="collapse"><i class="icon-repeat"></i>Bank Transfer</a>
                                </h6>
                            </div>
                            <div class="collapse" id="collapseTwo" data-parent="#accordion1" role="tabpanel">
                                <div class="card-body text-center">
                                    <div>Account : 4213 xxxx xxxx 8888</div>
                                    <div>Amount: <i class="text-bold"> ${{$order->totalPrice}}</i></div>
                                    <div>Please use the order Number: <i class="text-bold">  {{$order->order_id}}</i> as reference</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end paddin-top-1x mt-4">

                        <a class="btn btn-primary" href="">Complete Order</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        setInterval(function () {
            $.ajax({
                type: 'post',
                url: '/order/checkStatus/{{$order->id}}' ,
                // method: 'POST',
                // dataType: 'json',
                {{--data: { "order" :{!! $order !!}},--}}
                success:function (res) {
                    if (res.valid == 1){
                        location.href = '/order/isPaid/{{$order->order_id}}';
                    }
                }
            })

        }, 2000)
    </script>

@endpush
