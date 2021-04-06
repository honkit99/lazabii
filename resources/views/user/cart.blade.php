@extends('user.layouts.contentHF')

@section('contents')
    <div class="col-md-6">
        <div class="page-title">
            <h1>Shopping Cart</h1>
        </div>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb justify-content-md-end">
            <li class="breadcrumb-item "><a href="{{ route('user.home') }}" class="color_white">Home</a></li>
            <li class="breadcrumb-item active">Shopping Cart</li>
        </ol>
    </div>
@endsection

@section('contenthf')
<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive shop_cart_table">
                	<table class="table">
                    	<thead>
                        	<tr>
                            	<th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            @foreach ($carts as $key => $cart)
                            <tr>
                            	<td class="product-thumbnail"><a href="shop-cart.html#"><img src="{{ asset('Template/images/product_img1.jpg') }}" alt="product1"></a></td>
                                <td class="product-name" data-title="Product"><a href="shop-cart.html#">{{ $cart["name"] }}</a></td>
                                <td class="product-price" data-title="Price">{{ $cart["price"] }}</td>
                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus">
                                        <input type="text" name="quantity" value="{{ $cart["quantity"] }}" title="Qty" class="qty" size="4">
                                        <input type="button" value="+" class="plus">
                                    </div>
                                </td>
                              	<td class="product-subtotal" data-title="Total">{{ number_format($cart["quantity"]*$cart["price"],2) }}</td>
                                <td class="product-remove" data-title="Remove"><a href="shop-cart.html#"><i class="ti-close"></i></a></td>
                            </tr>
                            <?php $total  += $cart["quantity"]*$cart["price"]; ?>
                            @endforeach
                        </tbody>
                        <tfoot>
                        	<tr>
                            	<td colspan="6" class="px-0">
                                	<div class="row no-gutters align-items-center">

                                    	<div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                            <div class="coupon field_form input-group">
                                                <input type="text" value="" class="form-control form-control-sm" placeholder="Enter Coupon Code..">
                                                <div class="input-group-append">
                                                	<button class="btn btn-fill-out btn-sm" type="submit">Apply Coupon</button>
                                                </div>
                                            </div>
                                    	</div>
                                        <div class="col-lg-8 col-md-6 text-left text-md-right">
                                            <button class="btn btn-line-fill btn-sm" type="submit">Update Cart</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            	<div class="medium_divider"></div>
            	<div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
            	<div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-6">
            	<div class="heading_s1 mb-3">
            		<h6>Calculate Shipping</h6>
                </div>
                <form class="field_form shipping_calculator">
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <div class="custom_select">
                                <select class="form-control">
                                    <option value="">Select your country...</option>
                                    <!-- Shipping country Example-->
                                    @foreach ($country as $countries )
                                        <option value="{{ $countries -> id }}">{{ $countries -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <div class="custom_select">
                                <select class="form-control">
                                    <option value="">Select your state...</option>
                                    <!-- Shipping country Example-->
                                    @foreach ($countryArea as $Area )
                                        <option value="{{ $Area -> id }}">{{ $Area -> state_area}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <button class="btn btn-fill-line" type="submit">Update Totals</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
            	<div class="border p-3 p-md-4">
                    <div class="heading_s1 mb-3">
                        <h6>Cart Totals</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">Cart Subtotal</td>
                                    <td class="cart_total_amount">$ {{number_format($total, 2)}}</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Shipping</td>
                                    <td class="cart_total_amount">$ {{ $Area -> price}}</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Total</td>
                                    <td class="cart_total_amount"><strong>$ {{number_format($total + $Area["price"], 2)}}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="shop-cart.html#" class="btn btn-fill-out">Proceed To CheckOut</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
@endsection

@section('up')
    <a href="{{ route('user.cart.index') }}" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
@endsection