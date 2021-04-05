@extends('user.layouts.contentHF')

@section('contents')
    <div class="col-md-6">
        <div class="page-title">
            <h1>Wishlist</h1>
        </div>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb justify-content-md-end">
            <li class="breadcrumb-item "><a href="{{ route('user.home') }}" class="color_white">Home</a></li>
            <li class="breadcrumb-item active">Wishlist</li>
        </ol>
    </div>
@endsection

@section('contenthf')
<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive wishlist_table">
                	<table class="table">
                    	<thead>
                        	<tr>
                            	<th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-stock-status">Stock Status</th>
                                <th class="product-add-to-cart"></th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        @if (isset($fill->product))
                            @foreach ($fill->product as $product)
                            <tbody>
                                <tr>
                                    <td class="product-thumbnail"><a href=""><img src="{{ asset('Template/images/product_img1.jpg') }}" alt="product1"></a></td>
                                    <td class="product-name" data-title="Product"><a href="">{{ $product->name }}</a></td>
                                    <td class="product-price" data-title="Price">RM{{ $product->price }}</td>
                                    <td class="product-stock-status" data-title="Stock Status"><span class="badge badge-pill badge-success">In Stock</span></td>
                                    <form action="{{ route('user.cart.update',$product->id) }}" method="POST">
                                        @csrf
                                        @method("PATCH")
                                        <td class="product-add-to-cart"><button><i class="icon-basket-loaded"></i> Add to Cart</button></td>
                                    </form>
                                    <form id="form1" action="{{route('Favourite.destroy',$favourite->id)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <td class="product-remove"><a href="#" onclick="$(this).parent().submit();"><i class="ti-close"></i></a></td>
                                    </form>
                                </tr>
                            </tbody>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
@endsection

@section('up')
    <a href="{{ route('user.favourite.index') }}" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
@endsection