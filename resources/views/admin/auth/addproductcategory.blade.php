@extends('admin.layouts.menu')

@section('content')
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
                     
						<div class="table-responsive">
						<table style="text-align: center;"id="dataTable1" class="display mb-4 dataTablesCard card-table text-black customer-list-tbl">
								<thead>
								<form action="{{route('admin.productCategory.store') }}" method="post">
                                @csrf
                                <label class="form-label">Category: </label>
                                
                                <select name="category"class="form-control " aria-label="Default select example">
                                    <option value="">-Please select the option-</option>   
                                    @foreach($categorys as $key =>$category)

                                    <option value="">{{$category -> id}}</option>
                                    @endforeach

                                </select>

                                @error('category')
                                <span class="mt-2 text-danger">{{ $message }}</span>
                                @enderror
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