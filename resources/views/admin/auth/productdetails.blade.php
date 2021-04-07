@extends('admin.layouts.menu')

@section('content')
<div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Product Detail </p>
                        </div>
                    </div>
             
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade show active" id="first">
                                                <img class="img-fluid" src="" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-slide-content new-arrival-product mb-4 mb-xl-0">
                                            <!-- Nav tabs -->
                                            <ul class="nav slide-item-list mt-3" role="tablist">
                                                <li role="presentation" class="show">
                                                    <a href="" role="tab" data-toggle="tab">
                                                        <img class="img-fluid" src="images/tab/1.jpg" alt="" width="50">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--Tab slider End-->
                                    <form action="{{route('admin.productimage') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                                        <div class="product-detail-content">
                                            <!--Product details-->
                                            <div class="new-arrival-content pr">
                                                <h4>{{$product ->name}}</h4>
                                                <div class="comment-review star-rating">
													<ul>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star-half-empty"></i></li>
													</ul>
												</div>
												<div class="d-table mb-2">
													<p class="price float-left d-block">{{$product ->price}}</p>
                                                </div>
                                                <p>Availability: <span class="item">{{$product ->status}} <i
                                                            class="fa fa-shopping-basket"></i></span>
                                                </p>
                                                <p>Quantity: <span class="item">{{$product ->quantity}} <i>
                                                </p>
                                                
                                                <p class="text-content">{{$product ->description}}</p>
												<div class="d-flex align-items-end flex-wrap mt-4">
													<div class="filtaring-area mb-3 mr-3">
                                                    
                                                    <p><b>Image: </b><input type="file" class="form-control"name="product_image"value=""></p>
													</div>
                                                    
                                                    <button type ="submit"class="btn btn-primary">Submit</button>

													</div>
												</div>
                                            </div>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<!-- review -->
			
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
            
@endsection

