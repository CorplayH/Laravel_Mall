@extends('homelayout.master')

@section('content')
    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="card text-center">
            <div class="card-body padding-top-2x">
                <h3 class="card-title">Thank you for your order!</h3>
                <p class="card-text">Your order has been placed and will be processed as soon as possible.</p>
                <p class="card-text">Make sure you make note of your order number, which is <span class="text-medium">{{$order}}</span></p>

                <div class="padding-top-1x padding-bottom-1x">
                    <a class="btn btn-outline-secondary" href="/">Go Back Shopping</a>
                </div>
            </div>
        </div>
    </div>



@endsection
