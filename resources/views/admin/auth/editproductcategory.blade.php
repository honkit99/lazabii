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
                     <form action="{{route('admin.categorys.update',$category->id) }}" method="post">
                        @csrf
                        @method("PATCH")
						<div class="table-responsive">
						<table style="text-align: center;"id="dataTable1" class="display mb-4 dataTablesCard card-table text-black customer-list-tbl">
								<thead>
                                <p><b>Parent ID: </b><input type="text" class="form-control"name="parent_id" value="{{$category ->parent_id}}"required></p>
                                <p><b>Category Name: </b><input type="text" class="form-control"name="name" value="{{$category ->name}}"required></p>
                                <p><b>Image: </b><input type="file" name="image"class="form-control"value=""></p>
                                <label class="form-label">Status: </label>
                                <select name="status"class="form-control" aria-label="Default select example">
                                    <option value="">-Please select the option-</option>
                                    <option value="0"{{($category->status ==0) ? 'selected' : null}}>Available</option>
                                    <option value="1"{{($category->status ==1) ? 'selected' : null}}>Disabled</option>
                                </select>
                                @error('status')
                                <span class="mt-2 text-danger">{{ $message }}</span>
                                @enderror
                                <button type ="submit"class="btn btn-primary">Submit</button>
                
								</form>
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