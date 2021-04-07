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
    @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
                @endif
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
                        @if (isset($favourites))
                            @foreach ($favourites as $favourite)
                            <tbody>
                                <tr>
                                    <td class="product-thumbnail"><a href=""><img src="{{ asset('Template/images/product_img1.jpg') }}" alt="product1"></a></td>
                                    <td class="product-name" data-title="Product"><a href="">{{ $favourite->id }}</a></td>
                                    <td class="product-price" data-title="Price">RM{{ $favourite->price }}</td>
                                    <td class="product-stock-status" data-title="Stock Status"><span class="badge badge-pill badge-success">In Stock</span></td>
                                    <td>
                                        <form action="{{ route('user.cartadded',array($favourite->product_id,$favourite->id)) }}" method="POST">
                                            @csrf
                                            <td class="product-add-to-cart"><button><i class="icon-basket-loaded"></i> Add to Cart</button></td>
                                        </form>
                                    </td>
                                    <td class="product-remove" data-title="Remove">
                                        <form action="{{route('user.favourite.destroy',$favourite->id) }}" method="post">
                                            @csrf
                                               @method('DELETE')
                                            <a href="#"onclick="return confirmation(this);" ><i class="ti-close"></i></a>
                                            </form>
                                    </td>
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
<script>
    function confirmation(form)
    {
        var answer;
        answer=confirm("Are you sure you want to delete this record?");
        if(answer)
            $(form).parent().submit();
        return answer;
    }
    </script> 
<!-- END SECTION SHOP -->
@endsection

@section('up')
    <a href="{{ route('user.favourite.index') }}" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
@endsection