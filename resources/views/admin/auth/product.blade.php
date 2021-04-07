@extends('admin.layouts.menu')

@section('content')
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="d-flex flex-wrap mb-3">
							<a href="{{route('admin.products.create')}}"  class="btn btn-outline-primary  mr-auto mb-2">Add New Product</a>
						</div>
						<div class="table-responsive">
						<table style="text-align: center;"id="dataTable1" class="display mb-4 dataTablesCard card-table text-black customer-list-tbl">
								<thead>
									<tr class="bg-primary">
										<th><strong class="font-w600 wspace-no">Product ID</strong></th>
                                        <th><strong class="font-w600 wspace-no">Product Name</strong></th>
										<th><strong class="font-w600 wspace-no">Product Price </strong></th>
										<th><strong class="font-w600 wspace-no ">Quantity</strong></th>
                                        <th><strong class="font-w600 wspace-no">Description </strong></th>
										<th><strong class="font-w600 wspace-no">Status</strong></th>
										<th colspan="3"><strong class="font-w600 wspace-no">Action</strong></th>
										<th class="bg-none"></th>
									</tr>
								</thead>


								<tbody>
                                @foreach($products as $key =>$product)
									<tr>
										<td>{{$product ->id}}</td>
                                        <td>{{$product ->name}}</td>
                                        <td>{{$product ->price}}</td>
                                        <td>{{$product ->quantity}}</td>
                                        <td>{{$product ->description}}</td>								
                                        <td> <span class="badge {{($product->status==0) ? 'bg-success' : (($product->status==1) ? 'bg-warning' :'bg-danger')}}">{{$product ->status}}</span></td>		
                                        <td> <a href="{{route('admin.products.show',$product->id) }}"><i class="fa fa-eye fa-o fa-2x"  aria-hidden="true"></i></a></td>
                                        <td> <a href=""><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a></td>
										<td>
										<form action="{{route('admin.products.destroy',$product->id) }}" method="post">
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
<script>
                function confirmation(form)
{
	var answer;
	answer=confirm("Are you sure you want to delete this product?");
	if(answer)
		$(form).parent().submit();
	return answer;
}
</script>
            </div>

            
@endsection

