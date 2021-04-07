@extends('user.layouts.contentHF')

@section('contents')
    <div class="col-md-6">
        <div class="page-title">
            <h1>Check-Out</h1>
        </div>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb justify-content-md-end">
            <li class="breadcrumb-item "><a href="{{ route('user.home') }}" class="color_white">Home</a></li>
            <li class="breadcrumb-item "><a href="{{ route('user.cart.index') }}" class="color_white">Cart</a></li>
            <li class="breadcrumb-item active">Check-Out</li>
        </ol>
    </div>
@endsection

@section('contenthf')
<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="col-12">
            <div class="medium_divider"></div>
            <div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
            <div class="medium_divider"></div>
        </div>
        <div class="row">
                <div class="col-md-6">
                <form method="POST" action="{{ route('user.order.store') }}">
                @csrf
                    <div class="heading_s1">
                        <h4>Billing Details (Required)</h4>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Receiver Name *">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email address *">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                    </div>
                    <div class="form-group">
                        <div class="custom_select">
                            <select name="country" class="form-control">
                                <option value="">Select your country...</option>
                                @foreach ($country as $countries )
                                    <option value="{{ $countries -> id }}">{{ $countries -> name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" placeholder="Receiver Address *">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="custom_select">
                            <select name="state" class="form-control">
                                <option value="">Select your state...</option>
                                @foreach ($state as $states )
                                    <option value="{{ $states -> id }}">{{ $states -> name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom_select">
                            <select name="city" class="form-control">
                                <option value="">Select your city...</option>
                                @foreach ($city as $cities )
                                    <option value="{{ $cities -> id }}">{{ $cities -> name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom_select">
                            <select name="postcode" class="form-control">
                                <option value="">Select your Postcode / ZIP...</option>
                                @foreach ($postcode as $postcodes )
                                    <option value="{{ $postcodes -> id }}">{{ $postcodes -> number}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" 
                         name="phone" placeholder="Phone Number *">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="order_review">
                        <div class="heading_s1">
                            <h4>Your Orders</h4>
                        </div>
                        <div class="table-responsive order_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $total = 0; ?>
                                @foreach ($carts as $key => $cart)
                                    <tr>
                                        <td>{{ $cart->product_name }}<span class="product-qty"> x {{ $cart->product_qty }}</span></td>
                                        <td>$ {{ number_format($cart->product_qty*$cart->product_price,2) }}</td>
                                    </tr>
                                    <?php $total  += $cart->product_qty* $cart->product_price; ?>
                                @endforeach
                                </tbody>
                                
                                <tfoot>
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal">$ {{ number_format($total, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td>Free Shipping</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td class="product-subtotal">$ {{ number_format($total, 2) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment_method">
                            <div class="heading_s1">
                                <h4>Payment</h4>
                            </div>
                            <div class="payment_option">
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" value="option3" checked="">
                                    <label class="form-check-label" for="exampleRadios3">Direct Bank Transfer</label>
                                    <p data-method="option3" class="payment-text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration. </p>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios4" value="option4">
                                    <label class="form-check-label" for="exampleRadios4">Check Payment</label>
                                    <p data-method="option4" class="payment-text">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios5" value="option5">
                                    <label class="form-check-label" for="exampleRadios5">Paypal</label>
                                    <p data-method="option5" class="payment-text">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-fill-out btn-block">Place Order</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
@endsection

@section('up')
<a href="{{ route('user.order.index') }}" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
@endsection