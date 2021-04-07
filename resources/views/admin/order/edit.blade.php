@extends('admin.layouts.menu')

@section('content')
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
                     <form action="{{route('admin.order.update',$order->id) }}" method="post">
                        @csrf
                        @method("PATCH")
						<div class="table-responsive">
                            <form>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Customer</label>
                                    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="customer"
                                        value="{{ $order->user->name }}" disabled>

                                        @error('customer')
                                            <span class="mt-2 text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputProduct" class="col-sm-2 col-form-label">Product</label>
                                    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product"
                                        value="{{ $order->product->name }}" disabled>

                                        @error('product')
                                            <span class="mt-2 text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
  
                                <div class="form-group row">
                                    <label for="inputDelivery" class="col-sm-2 col-form-label">Delivery</label>
                                    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="delivery_company_name"
                                        value="{{ $order->delivery_company_name }}" disabled>

                                        @error('delivery_company_name')
                                            <span class="mt-2 text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputDelivery_status" class="col-sm-2 col-form-label">
                                        Delivery Status
                                    </label>
                                    
                                    <select class="col-sm-10" name="delivery_status">
                                        <option value="0" {{ ($order->delivery_status == 0) ? 'selected' : null }}>
                                            New
                                        </option>
                                        <option value="1" {{ ($order->delivery_status == 1) ? 'selected' : null }}>
                                            On The Way
                                        </option>
                                        <option value="2" {{ ($order->delivery_status == 2) ? 'selected' : null }}>
                                            Done
                                        </option>
                                    </select>

                                    @error('delivery_status')
                                        <span class="mt-2 text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="inputPayment" class="col-sm-2 col-form-label">
                                        Payment Amount
                                    </label>
                                    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="total_payment_amount"
                                        value="{{ $order->total_payment_amount }}" disabled>

                                        @error('total_payment_amount')
                                            <span class="mt-2 text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPayment_status" class="col-sm-2 col-form-label">
                                        Payment Status
                                    </label>
                                    
                                    <select class="col-sm-10" name="payment_status">
                                        <option class="form-control" value="0" {{ ($order->payment_status == 0) ? 'selected' : null }}>
                                            New
                                        </option>
                                        <option class="form-control" value="1" {{ ($order->payment_status == 1) ? 'selected' : null }}>
                                            On The Way
                                        </option>
                                        <option class="form-control" value="2" {{ ($order->payment_status == 2) ? 'selected' : null }}>
                                            Done
                                        </option>
                                    </select>

                                    @error('payment_status')
                                        <span class="mt-2 text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="inputAddress" class="col-sm-2 col-form-label">
                                        Address
                                    </label>
                                    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address" 
                                        value="{{ $order->address }}" disabled>

                                        @error('address')
                                            <span class="mt-2 text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputAddress" class="col-sm-2 col-form-label">
                                        Transaction Id
                                    </label>
                                    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="transaction_id"
                                        value="{{ $order->transaction_id }}" disabled>

                                        @error('transaction_id')
                                            <span class="mt-2 text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
  
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>

                                    <div class="col-sm-10">
                                        <a href="{{route('admin.order.index') }}">
                                            <button type="button" class="btn btn-primary">Back</button>
                                        </a>
                                    </div>
                                </div>
                            </form>
						</div>
					</div>
				</div>
            </div>      
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection