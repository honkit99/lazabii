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
								<form action="{{route('admin.users.store') }}" method="post">
                                @csrf
                                <p><b>Name: </b><input type="text" name="name"class="form-control @error('name') is-invalid @enderror" minlength="5"value="{{ old('name') }}"></p>
								@error('name')
                                <span class="mt-2 text-danger">{{ $message }}</span>
                                @enderror
                                <p><b>Email: </b><input type="email" class="form-control @error('email') is-invalid @enderror"name="email"value="{{ old('email') }}"></p>
								@error('email')
                                <span class="mt-2 text-danger">{{ $message }}</span>
                                @enderror
                                <label class="form-label">Gender: </label>
                                <select name="gender"class="form-control @error('gender') is-invalid @enderror" aria-label="Default select example">
                                    <option value="">-Please select the option-</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                                @error('gender')
                                <span class="mt-2 text-danger">{{ $message }}</span>
                                @enderror
                                
                                <p><b>Phone number: </b><input type="tel" class="form-control @error('phone') is-invalid @enderror"name="phone"pattern="[0-9]{3}-[0-9]{7}" value="{{ old('phone') }}"></p>
								@error('phone')
                                <span class="mt-2 text-danger">{{ $message }}</span>
                                @enderror
                                <p><b>Date of Birth: </b><input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror"value="{{ old('dob') }}"></p>
								<p><b>Password: </b><input type="password" name="password"class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}"></p>
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