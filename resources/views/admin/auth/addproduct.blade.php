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
								<form action="{{route('admin.products.store') }}" method="post">
                                @csrf
                                <p><b>Product Name: </b><input type="text" name="name"class="form-control @error('name') is-invalid @enderror"value="{{ old('name') }}"></p>
								@error('name')
                                <span class="mt-2 text-danger">{{ $message }}</span>
                                @enderror
                                <p><b>Price: </b><input type="text" class="form-control @error('price') is-invalid @enderror"name="price"value="{{ old('price') }}"></p>
								@error('price')
                                <span class="mt-2 text-danger">{{ $message }}</span>
                                @enderror
                                <p><b>Quantity: </b><input type="text" class="form-control @error('qty') is-invalid @enderror"name="quantity"value="{{ old('quantity') }}"></p>
								@error('quantity')
                                <span class="mt-2 text-danger">{{ $message }}</span>
                                @enderror
                                <p><b>Description: </b><input type="text" class="form-control @error('description') is-invalid @enderror"name="description"value="{{ old('descrption') }}"></p>
								@error('description')
                                <span class="mt-2 text-danger">{{ $message }}</span>
                                @enderror
                                <label class="form-label">Category: </label>
                                
                                <select name="category"class="form-control " aria-label="Default select example">
                                    <option value="">-Please select the option-</option>   
                                    @foreach($categorys as $key =>$category)

                                    <option value="{{$category -> id}}">{{$category -> name}}</option>
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