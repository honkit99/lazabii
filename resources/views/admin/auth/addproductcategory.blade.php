@extends('admin.layouts.menu')

@section('content')

<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
                     
						<div class="table-responsive">
						<table style="text-align: center;"id="dataTable1" class="display mb-4 dataTablesCard card-table text-black customer-list-tbl" >
								<thead>
								<form action="{{route('admin.categorys.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <p><b>Parent ID: </b><input type="text" class="form-control "name="parent_id"value=""></p>
                                <p><b>Categorys Name: </b><input type="text" class="form-control"name="name"value=""></p>
                                <p><b>Image: </b><input type="file" class="form-control"name="image"value=""></p>
                                <select name="status"class="form-control" aria-label="Default select example">
                                <option value="">-Please select the option-</option>
                                <option value="0">Available</option>
                                <option value="1">Disabled</option>
                                </select>
                                <button type ="submit"class="btn btn-primary">Submit</button>
                
								</form>
								</thead>
							</table>
						</div>
					</div>
				</div>
            </div>
           
        </div>

@endsection