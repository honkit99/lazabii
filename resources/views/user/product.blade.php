@extends('user.layouts.contentHF')

@section('contents')
    <div class="col-md-6">
        <div class="page-title">
            <h1>Shop</h1>
        </div>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb justify-content-md-end">
            <li class="breadcrumb-item "><a href="{{ route('user.home') }}" class="color_white">Home</a></li>
            <li class="breadcrumb-item active">Product</li>
            @foreach ($filproducts as $fill)
                @if (isset($fill))
                <li class="breadcrumb-item active">{{ $fill->name }}</li>
                @else
                <li class="breadcrumb-item active"></li>
                @endif
            
        </ol>
    </div>
@endsection

@section('contenthf')
<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
    	<div class="row">
			<div class="col-lg-9">
            	<div class="row align-items-center mb-4 pb-1">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="product_header_left">
                                <div class="custom_select">
                                    <select class="form-control form-control-sm">
                                        <option value="order">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="product_header_right">
                            	<div class="products_view">
                                    <a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
                                    <a href="javascript:Void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
                                </div>
                                <div class="custom_select">
                                    <select class="form-control form-control-sm">
                                        <option value="">Showing</option>
                                        <option value="9">9</option>
                                        <option value="12">12</option>
                                        <option value="18">18</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
                <div class="row shop_container">
                    <!-- Product -->
                    <div class="col-md-4 col-6">
                        <div class="product">
                            <div class="product_img">
                                <img src="{{ asset('Template/images/product_img1.jpg') }}" alt="product_img1">
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        <li class="add-to-cart"><a href=""><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                        <li><a href=""><i class="icon-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="">Product name</a></h6>
                                <div class="product_price">
                                    <span class="price">Discount price</span>
                                    <del>Original price</del>
                                    <div class="on_sale">
                                        <span>100% off</span>
                                    </div>
                                </div>
                                <div class="rating_wrap">
                                    <div class="rating">
                                        <!-- Rating Star -->
                                        <div class="product_rate" style="width:80%"></div>
                                    </div>
                                    <span class="rating_num">(21)</span>
                                </div>
                                <div class="pr_switch_wrap">
                                    <div class="product_color_switch">
                                        <span class="active" data-color="#87554B"></span>
                                        <span data-color="#333333"></span>
                                        <span data-color="#DA323F"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- EndProduct -->
                        {{-- test --}}
                     @if (isset($fill->product))
                @foreach ($fill->product as $product)
                    <div class="col-md-4 col-6">
                        <div class="product">
                            <div class="product_img">
                                <img src="{{ asset('Template/images/product_img1.jpg') }}" alt="product_img1">
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        <form action="{{ route('user.addtocart',$product->id) }}" method="POST">
                                            @csrf
                                            <li class="add-to-cart"><button><i class="icon-basket-loaded"></button></i></li>
                                        </form>
                                        {{-- <li class="add-to-cart"><a href="{{ route('user.cart.store',$product->id) }}" role="button"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                        <li><a href=""><i class="icon-heart"></i></a></li> --}}
                                   </ul>
                                </div>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="">{{ $product->name }}</a></h6>
                                <div class="product_price">
                                    <span class="price">RM{{ $product->price }}</span>
                                    <del>Original price</del>
                                    <div class="on_sale">
                                        <span>100% off</span>
                                    </div>
                                </div>
                                <div class="rating_wrap">
                                    <div class="rating">
                                        <!-- Rating Star -->
                                        <div class="product_rate" style="width:80%"></div>
                                    </div>
                                    <span class="rating_num">(21)</span>
                                </div>
                                <div class="pr_switch_wrap">
                                    <div class="product_color_switch">
                                        <span class="active" data-color="#87554B"></span>
                                        <span data-color="#333333"></span>
                                        <span data-color="#DA323F"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    {{-- endtest --}}
                </div>
                @endforeach 
                {{-- @foreach ($products as $product)
                    <div class="col-md-4 col-6">
                        <div class="product">
                            <div class="product_img">
                                <img src="{{ asset('Template/images/product_img1.jpg') }}" alt="product_img1">
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        <form action="{{ route('user.cart.update',$product->id) }}" method="POST">
                                            @csrf
                                            @method("PATCH")
                                            <li class="add-to-cart"><button><i class="icon-basket-loaded"></button></i></li>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="">{{ $product->name }}</a></h6>
                                <div class="product_price">
                                    <span class="price">RM{{ $product->price }}</span>
                                    <del>Original price</del>
                                    <div class="on_sale">
                                        <span>100% off</span>
                                    </div>
                                </div>
                                <div class="rating_wrap">
                                    <div class="rating">
                                        <!-- Rating Star -->
                                        <div class="product_rate" style="width:80%"></div>
                                    </div>
                                    <span class="rating_num">(21)</span>
                                </div>
                                <div class="pr_switch_wrap">
                                    <div class="product_color_switch">
                                        <span class="active" data-color="#87554B"></span>
                                        <span data-color="#333333"></span>
                                        <span data-color="#DA323F"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach --}}
                <div>
                {{-- {{ $filproducts->links() }} --}}
               </div>
        		<div class="row">
                    <div class="col-12">
                        <ul class="pagination mt-3 justify-content-center pagination_style1">
                            <li class="page-item active"><a class="page-link" href="shop-left-sidebar.html#">1</a></li>
                            <li class="page-item"><a class="page-link" href="shop-left-sidebar.html#">2</a></li>
                            <li class="page-item"><a class="page-link" href="shop-left-sidebar.html#">3</a></li>
                            <li class="page-item"><a class="page-link" href="shop-left-sidebar.html#"><i class="linearicons-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
        	</div>
            <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
            	<div class="sidebar">
                	<div class="widget">
                        <h5 class="widget_title">Categories</h5>
                        <ul class="widget_categories">
                            <!-- Categories -->
                            <li><a href="shop-left-sidebar.html#"><span class="categories_name">Women</span><span class="categories_num">(9)</span></a></li>
                        </ul>
                    </div>
                    <div class="widget">
                    	<h5 class="widget_title">Filter</h5>
                        <div class="filter_price">
                             <div id="price_filter" data-min="0" data-max="500" data-min-value="50" data-max-value="300" data-price-sign="$"></div>
                             <div class="price_range">
                                 <span>Price: <span id="flt_price"></span></span>
                                 <input type="hidden" id="price_first">
                                 <input type="hidden" id="price_second">
                             </div>
                         </div>
                    </div>
                    <div class="widget">
                    	<h5 class="widget_title">Brand</h5>	
                        <ul class="list_brand">
                            <li>
                                <!-- Brand -->
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="Arrivals" value="">
                                    <label class="form-check-label" for="Arrivals"><span>New Arrivals</span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="widget">
                    	<h5 class="widget_title">Size</h5>
                        <div class="product_size_switch">
                            <span>xs</span>
                            <span>s</span>
                            <span>m</span>
                            <span>l</span>
                            <span>xl</span>
                            <span>2xl</span>
                            <span>3xl</span>
                        </div>
                    </div>
                    <div class="widget">
                    	<h5 class="widget_title">Color</h5>
                        <div class="product_color_switch">
                            <span data-color="#87554B"></span>
                            <span data-color="#333333"></span>
                            <span data-color="#DA323F"></span>
                            <span data-color="#2F366C"></span>
                            <span data-color="#B5B6BB"></span>
                            <span data-color="#B9C2DF"></span>
                            <span data-color="#5FB7D4"></span>
                            <span data-color="#2F366C"></span>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="shop_banner">
                            <div class="banner_img overlay_bg_20">
                                <img src="{{ asset('Template/images/sidebar_banner_img.jpg') }}" alt="sidebar_banner_img">
                            </div> 
                            <div class="shop_bn_content2 text_white">
                                <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                                <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                                <a href="shop-left-sidebar.html#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
@endsection

@section('up')
<a href="{{ route('user.product.index') }}" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
@endsection