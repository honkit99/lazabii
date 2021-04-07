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
                                    <td class="product-name" data-title="Product"><a href="shop-cart.html#">{{ $cart->product_name }}</a></td>
                                    <td class="product-price" data-title="Price">$ {{ $cart->product_price  }}</td>
                                    <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <div>
                                            <form class="container" method="POST" action="{{ route('user.updatecart',$cart->id) }}">
                                                @csrf
                                                @method("PATCH")

                                            {{-- <input type="number" name="product_qty" value="{{ $todo->title }}" class="form-control" > --}}
                                            <input type="number" name="product_qty" value="{{ $cart->product_qty }}" title="Qty" class="form-control" >
                                            {{-- <input type="button" value="+" class="plus"> --}}
                                            <button class="btn btn-fill-line" type="submit">Update Cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    </td>
                                    <td class="product-subtotal" data-title="Total">$ {{ number_format($cart->product_qty*$cart->product_price,2) }}</td>
                                    <td class="product-remove" data-title="Remove">
                                        <form action="{{route('user.cart.destroy',$cart->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#"onclick="return confirmation(this);" ><i class="ti-close"></i></a>
                                        </form>
                                    </td>
                                </tr>
                                <?php $total  += $cart->product_qty* $cart->product_price; ?>
                            @endforeach
                        </tbody>
                        <tfoot>
                        	<tr>
                            	<td colspan="6" class="px-0">
                                	<div class="row no-gutters align-items-center">
                                    	<div class="col-lg-4 col-md-6 mb-3 mb-md-0">
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
            	<div class="border p-3 p-md-4">
                    <div class="heading_s1 mb-3">
                        <h6>Cart Totals</h6>
                    </div>
                    <div class="table-responsive ">
                        <table class="table">
                            <thead>
                            @foreach ($carts as $key => $cart)
                                <tr>
                                    <td>{{ $cart->product_name }}<span class="product-qty"> x {{ $cart->product_qty }}</span></td>
                                    <td>$ {{ number_format($cart->product_qty*$cart->product_price,2) }}</td>
                                </tr>
                             @endforeach
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Total</th>
                                    <th>$ {{ number_format($total, 2) }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('user.order.index') }}" class="btn btn-fill-out">Proceed To CheckOut</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmation(form)
    {
        var answer;
        answer=confirm("Are you sure you want to delete this cart?");
        if(answer)
            $(form).parent().submit();
        return answer;
    }
</script> 
<!-- END SECTION SHOP -->
@endsection

@section('up')
    <a href="{{ route('user.cart.index') }}" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
@endsection

