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
							<a href="{{route('admin.users.create')}}"  class="btn btn-outline-primary  mr-auto mb-2">Add New User</a>
						</div>							
						<div class="table-responsive">
							<table style="text-align: center;"id="dataTable1" class="display mb-4 dataTablesCard card-table text-black customer-list-tbl">
								<thead >
									<tr class="bg-primary">
										<th class="sorting_1  pr-0 text-center bg-none no-data-img ">
											<div class="custom-control custom-checkbox ml-2">
												<input type="checkbox" class="custom-control-input" id="checkAll" required="">
												<label class="custom-control-label" for="checkAll"></label>
											</div>
										</th>
                                       
										<th><strong class="font-w600 wspace-no">User ID</strong></th>
                                        <th><strong class="font-w600 wspace-no">User Name</strong></th>
										<th><strong class="font-w600 wspace-no">User Email </strong></th>
										<th><strong class="font-w600 wspace-no">Gender</strong></th>
                                        <th><strong class="font-w600 wspace-no">Phone </strong></th>
										<th><strong class="font-w600 wspace-no">Date of Birth</strong></th>
										<th colspan="2"><strong class="font-w600 wspace-no">Action</strong></th>
										<th class="bg-none"></th>
									</tr>
								</thead>
								<tbody>
                                @foreach($users as $key =>$user)
									<tr>
										<td class="sorting_1 pr-0 text-center">
											<div class="custom-control custom-checkbox ml-2">
												<input type="checkbox" class="custom-control-input" id="customCheckBox5" required="">
												<label class="custom-control-label" for="customCheckBox5"></label>
											</div>
										</td>
              
										<td>{{$user ->id}}</td>
                                        <td>{{$user ->name}}</td>
                                        <td>{{$user ->email}}</td>
                                        <td><span class="badge {{($user->status==0) ? 'bg-success' : (($user->status==1) ? 'bg-warning' :'bg-danger')}}">{{$user ->status_name}}</span></td>		
                                        <td>{{$user ->phone}}</td>								
										<td>{{$user ->dob}}</td>
										<td> <a href="{{route('admin.users.edit',$user->id)}}"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></a></i></td>
										
										<td>
										<form action="{{route('admin.users.destroy',$user->id) }}" method="post">
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
	answer=confirm("Are you sure you want to delete this user?");
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