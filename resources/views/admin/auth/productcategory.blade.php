@extends('admin.layouts.menu')

@section('content')
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="d-flex flex-wrap mb-3">
							<a href="{{route('admin.categorys.create')}}"  class="btn btn-outline-primary  mr-auto mb-2">Add New Category</a>
						</div>
						<div class="table-responsive">
						<table style="text-align: center;"id="dataTable1" class="display mb-4 dataTablesCard card-table text-black customer-list-tbl">
								<thead>
									<tr class="bg-primary">
										<th class="sorting_1  pr-0 text-center bg-none no-data-img ">
										</th>                                    
										<th><strong class="font-w600 wspace-no">Category ID</strong></th>
                                        <th><strong class="font-w600 wspace-no">Parent ID</strong></th>
										<th><strong class="font-w600 wspace-no">Category Name </strong></th>
                                        <th><strong class="font-w600 wspace-no">Image </strong></th>
                                        <th><strong class="font-w600 wspace-no">Status </strong></th>
										<th colspan="2"><strong class="font-w600 wspace-no">Action</strong></th>
										<th class="bg-none"></th>
									</tr>
								</thead>
								<tbody>
                                @foreach($categorys as $key =>$category)										
									<tr>
										<td class="sorting_1 pr-0 text-center">
								
										</td>
                                        <td>{{$category ->id}}</td>
                                        <td>{{$category ->parent_id}}</td>
                                        <td>{{$category ->name}}</td>
                                        <td><img style="height:100px; width:100px;" alt="X Image" class="rounded-full" src="{{asset('/storage/images/users/'.$category->image)}}"></td>
                                        <td><span class="badge {{($category->status==0) ? 'bg-success' : (($category->status==1) ? 'bg-warning' :'bg-danger')}}">{{$category ->status_name}}</td>
										<td> <a href="{{route('admin.categorys.edit',$category->id)}}"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></a></i></td>
										<td>
										<form action="{{route('admin.categorys.destroy',$category->id) }}" method="post">
										@csrf
       									@method("DELETE")
                                           <a href="#"onclick="return confirmation(this);" ><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
										</form>
										</td>
										</div>
									</tr>
                                    @endforeach

								</tbody>

							</table>
                            
						</div>
					</div>
				</div>

<script>
function confirmation(form)
{
	var answer;
	answer=confirm("Are you sure you want to delete this category?");
	if(answer)
		$(form).parent().submit();
	return answer;
}
</script>
            </div>
@endsection