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
							<a href="{{route('admin.admins.create')}}"  class="btn btn-outline-primary  mr-auto mb-2">Add New Admin</a>
						</div>
						<div class="table-responsive">
						<table style="text-align: center;"id="dataTable1" class="display mb-4 dataTablesCard card-table text-black customer-list-tbl">
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
										<th><strong class="font-w600 wspace-no ">Gender</strong></th>
                                        <th><strong class="font-w600 wspace-no">Phone </strong></th>
										<th><strong class="font-w600 wspace-no">Date of Birth</strong></th>
										<th colspan="2"><strong class="font-w600 wspace-no">Action</strong></th>
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
                                        <td> <span class="badge {{($admin->status==0) ? 'bg-success' : (($admin->status==1) ? 'bg-warning' :'bg-danger')}}">{{$admin ->status_name}}</span></td>		
                                        <td>{{$admin ->phone}}</td>								
										<td>{{$admin ->dob}}</td>
										<td> <a href="{{route('admin.admins.edit',$admin->id)}}"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></a></i></td>
										
										<td>
										<form action="{{route('admin.admins.destroy',$admin->id) }}" method="post">
										@csrf
       									@method("DELETE")
										<a href="#"onclick="return confirmation(this);" ><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
										</form>
										</td>
										
                                        @endforeach
										</div>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
            </div>
			<script>
function confirmation(form)
{
	var answer;
	answer=confirm("Are you sure you want to delete this admin?");
	if(answer)
		$(form).parent().submit();
	return answer;
}
</script>
        </div>
		
        <!--**********************************
            Content body end
        ***********************************-->

	
@endsection