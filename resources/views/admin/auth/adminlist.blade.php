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
						<div class="d-flex flex-wrap mb-3">
							<a href="javascript:void(0);" data-toggle="modal" data-target="#addContactModal" class="btn btn-outline-primary  mr-auto mb-2">Add New Customer</a>
							<!-- Add Order -->
							<div class="modal fade" id="addContactModal">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Add Contact</h5>
											<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form>
												<div class="form-group">
													<label class="text-black font-w500">First Name</label>
													<input type="text" class="form-control">
												</div>
												<div class="form-group">
													<label class="text-black font-w500">Last Name</label>
													<input type="text" class="form-control">
												</div>
												<div class="form-group">
													<label class="text-black font-w500">Address</label>
													<input type="text" class="form-control">
												</div>
												<div class="form-group">
													<button type="button" class="btn btn-primary">SAVE</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<select class="form-control style-2 mr-3 mb-2 default-select ">
								<option>Filter</option>
								<option>Date</option>
							</select>
							<select class="form-control style-2 mb-2 default-select ">
								<option>Newest</option>
								<option>Oldest</option>
							</select>
						</div>
						<div class="table-responsive">
							<table id="dataTable1" class="display mb-4 dataTablesCard card-table text-black customer-list-tbl">
								<thead>
									<tr class="bg-primary">
										<th class="sorting_1  pr-0 text-center bg-none no-data-img ">
											<div class="custom-control custom-checkbox ml-2">
												<input type="checkbox" class="custom-control-input" id="checkAll" required="">
												<label class="custom-control-label" for="checkAll"></label>
											</div>
										</th>
                                       
										<th><strong class="font-w600 wspace-no">Admin ID</strong></th>
                                        <th><strong class="font-w600 wspace-no">Admin Name</strong></th>
										<th><strong class="font-w600 wspace-no">Admin Email </strong></th>
										<th><strong class="font-w600 wspace-no">Gender</strong></th>
                                        <th><strong class="font-w600 wspace-no">Phone </strong></th>
										<th><strong class="font-w600 wspace-no">Date of Birth</strong></th>
										<th class="bg-none"></th>
									</tr>
								</thead>
								<tbody>
                                @foreach($admins as $key =>$admin)
									<tr>
										<td class="sorting_1 pr-0 text-center">
											<div class="custom-control custom-checkbox ml-2">
												<input type="checkbox" class="custom-control-input" id="customCheckBox5" required="">
												<label class="custom-control-label" for="customCheckBox5"></label>
											</div>
										</td>
                                       
										<td>{{$admin ->id}}</td>
                                        <td>{{$admin ->name}}</td>
                                        <td>{{$admin ->email}}</td>
                                        <td>{{$admin ->gender}}</td>		
                                        <td>{{$admin ->phone}}</td>								
										<td>{{$admin ->dob}}</td>
                                        @endforeach

																		
											</div>
										
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
            </div>
           
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

	
@endsection