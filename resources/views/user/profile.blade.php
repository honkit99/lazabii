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
            <li class="breadcrumb-item active">Profile edit</li>
        </ol>
    </div>
@endsection

@section('contenthf')
<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="account-detail-tab" data-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="false"><i class="ti-layout-grid2"></i>Profile</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>My Purchase</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>My Address</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="notification-tab" data-toggle="tab" href="#notification" role="tab" aria-controls="notification" aria-selected="true"><i class="ti-id-badge"></i>Notification</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="login.html"><i class="ti-lock"></i>Logout</a>
                      </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content dashboard_content">
                  	<div class="tab-pane fade show active" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
						<div class="card">
                        	<div class="card-header">
                                <h3>Account Details</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" name="enq">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                        	<label>Username <span class="required"></span></label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                            name="name" value="{{ Auth('user')->user()->name }}" 
                                            required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                         </div>
                                        <div class="form-group col-md-12">
                                        	<label>E-Mail Address <span class="required"></span></label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                            name="email" value="{{ Auth('user')->user()->email }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Gender <span class="required"></span></label>
                                            <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" 
                                            name="gender" value="{{ Auth('user')->user()->gender }}" required autocomplete="gender" autofocus>
                                                <option value="0">Male</option>
                                                <option value="1">Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Phone Number <span class="required"></span></label>
                                            <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                            name="phone" value="{{ Auth('user')->user()->phone }}" autocomplete="phone" autofocus>

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Date Of Birth <span class="required"></span></label>
                                            <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" 
                                            name="dob" value="{{ Auth('user')->user()->dob }}" required autocomplete="dob" autofocus>

                                            @error('dob')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                        	<label>Current Password <span class="required"></span></label>
                                            <input id="current_password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                            name="current_password" autocomplete="new-password">

                                            @error('current_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                        	<label>New Password <span class="required"></span></label>
                                            <input id="change_password" type="password" 
                                            class="form-control @error('password') is-invalid @enderror" 
                                            name="password" autocomplete="new-password">
                                        </div>
                                        <div class="form-group col-md-12">
                                        	<label>Confirm Password <span class="required"></span></label>
                                            <input id="comfirm_password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                            name="comfirm_password" autocomplete="new-password">

                                            @error('comfirm_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-fill-out">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
					</div>
                  	<div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Orders</h3>
                            </div>
                            <div class="card-body">
                    			<div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#1234</td>
                                                <td>March 15, 2020</td>
                                                <td>Processing</td>
                                                <td>$78.00 for 1 item</td>
                                                <td><a href="" class="btn btn-fill-out btn-sm">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>#2366</td>
                                                <td>June 20, 2020</td>
                                                <td>Completed</td>
                                                <td>$81.00 for 1 item</td>
                                                <td><a href="" class="btn btn-fill-out btn-sm">View</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                  	</div>
					<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                    	<div class="row">
                        	<div class="col-lg-6">
                                <div class="card mb-3 mb-lg-0">
                                    <div class="card-header">
                                        <h3>Billing Address</h3>
                                    </div>
                                    <div class="card-body">
                                        <address>House #15<br>Road #1<br>Block #C <br>Angali <br> Vedora <br>1212</address>
                                        <p>New York</p>
                                        <a href="" class="btn btn-fill-out">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Shipping Address</h3>
                                    </div>
                                    <div class="card-body">
                                        <address>House #15<br>Road #1<br>Block #C <br>Angali <br> Vedora <br>1212</address>
                                        <p>New York</p>
                                        <a href="" class="btn btn-fill-out">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
					<div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Username</h3>
                            </div>
                            <div class="card-body">
                    			<p>From your account notification. you can easily check &amp; view your <a href="javascript:void(0);" onclick="$('#orders-tab').trigger('click')">recent orders</a>, manage your <a href="javascript:void(0);" onclick="$('#address-tab').trigger('click')">shipping and billing addresses</a> and <a href="javascript:void(0);" onclick="$('#account-detail-tab').trigger('click')">edit your password and account details.</a></p>
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
    <a href="{{ route('user.profile.edit', Auth('user')->user()->id) }}" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
@endsection