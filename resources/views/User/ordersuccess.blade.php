@extends('user.layouts.contentHF')

@section('contents')
    <div class="col-md-6">
        <div class="page-title">
            <h1>Order Success</h1>
        </div>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb justify-content-md-end">
            <li class="breadcrumb-item "><a href="{{ route('user.home') }}" class="color_white">Home</a></li>
            <li class="breadcrumb-item "><a href="{{ route('user.cart.index') }}" class="color_white">Cart</a></li>
            <li class="breadcrumb-item active">Check-Out</li>
            <li class="breadcrumb-item active">Order Success</li>
        </ol>
    </div>
@endsection

@section('contenthf')
<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center order_complete">
                	<i class="fas fa-check-circle"></i>
                    <div class="heading_s1">
                  	<h3>Your order is completed!</h3>
                    </div>
                  	<p>Thank you for your order! Your order is being processed and will be completed within 3-6 hours. You will receive an email confirmation when your order is completed.</p>
                    <a href="shop-left-sidebar.html" class="btn btn-fill-out">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
@endsection

@section('up')
<a href="{{ route('user.ordersuccess') }}" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
@endsection