@extends('homelayout.master')

@section('content')
    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="row">
            <!-- Checkout Adress-->
            <div class="col-xl-12 col-lg-12">
                <div class="steps flex-sm-nowrap mb-5">
                    <a class="step" href="/order">
                        <h4 class="step-title"><i class="icon-check-circle"></i>1. Address</h4>
                    </a>
                    <a class="step active" href="javacript:;">
                        <h4 class="step-title">2. Review</h4>
                    </a>
                    <a class="step" href="javascript:;">
                        <h4 class="step-title">3. Payment</h4>
                    </a>

                </div>
                <h4 class="padding-bottom-1x">Review Your Order</h4>
                <div class="table-responsive shopping-cart">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th class="text-center">Subtotal</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartList as $cart)
                            <tr>
                                <td>
                                    <div class="product-item">
                                        <a class="product-thumb" href="#"><img src="{{$cart['goods']['images'][0]}}" alt="Product"></a>
                                        <div class="product-info">
                                            <h4 class="product-title">
                                                <a href="javascript:;">
                                                    {{$cart['goods']['gname']}}
                                                    <small> x{{$cart['num']}}</small>
                                                </a>
                                            </h4>
                                            <div class="float-left">
                                                @foreach($cart['attrs']['topAttr'] as $attr)
                                                    <span>
                                                        <em> {{$attr}} :&nbsp</em>
                                                    </span>
                                                @endforeach
                                            </div>
                                            <div class="float-left">
                                                @foreach($cart['attrs']['attrName'] as $attr)
                                                    <span>
                                                <em>{{$attr}}</em>
                                                </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center text-lg">${{$cart['unitTotal']}}</td>
                                <td class="text-center"><a class="btn btn-outline-primary btn-sm" href="{{route('cart.cartList')}}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="shopping-cart-footer">
                    <div class="column"></div>
                    <div class="column text-lg"><span class="text-muted">Subtotal:&nbsp; </span><span
                            class="text-gray-dark">${{$totalPrice}}</span></div>
                </div>
                <div class="row padding-top-1x mt-3">
                    <div class="col-sm-6">
                        <h5>Shipping to:</h5>
                        <ul class="list-unstyled">
                            <li><span class="text-muted">Client:&nbsp; </span>{{$address->name}}</li>
                            @if($address->company)
                                <li><span class="text-muted">Company:&nbsp; </span>{{$address->company}}</li>
                            @endif

                            @if($address->flat)
                            <li>
                                <span class="text-muted">Flat / Unit:&nbsp; </span>
                                {{$address->flat}}
                            </li>
                            @endif
                            <li>
                                <span class="text-muted">Address:&nbsp; </span>
                                {{$address->address}}
                                &nbsp{{$address->suburb}}&nbsp{{$address->city}}
                            </li>
                            <li><span class="text-muted">Country:&nbsp; </span>{{$address->country}}</li>
                            <li><span class="text-muted">Phone:&nbsp; </span>{{$address->phone}}</li>

                        </ul>
                    </div>
                </div>
                <div class="d-flex justify-content-between paddin-top-1x mt-4">
                    <a class="btn btn-outline-secondary" href="/order">
                        <i class="icon-arrow-left"></i>
                        <span class="hidden-xs-down">&nbsp;Back</span>
                    </a>
                    <a class="btn btn-primary" href="{{route('order.store')}}">Confirm Order</a>
                </div>
            </div>
        </div>
    </div>

@endsection
