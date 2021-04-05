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
                     <form action="{{route('admin.admins.update',$admin->id) }}" method="post">
                        @csrf
                        @method("PATCH")
						<div class="table-responsive">
						<table style="text-align: center;"id="dataTable1" class="display mb-4 dataTablesCard card-table text-black customer-list-tbl">
								<thead>
                                <p><b>Name: </b><input type="text" name="name" minlength="5"value="{{$admin ->name}}"required></p>
                                <p><b>Email: </b><input type="email" value="{{$admin ->email}}"disabled></p>
                                <input type="hidden"  name="email" value="{{$admin ->email}}">
                                <label class="form-label">Gender: </label>
                                <select name="gender"class="form-select" aria-label="Default select example">
                                    <option value="">-Please select the option-</option>
                                    <option value="0"{{($admin->status ==0) ? 'selected' : null}}>Male</option>
                                    <option value="1"{{($admin->status ==1) ? 'selected' : null}}>Female</option>
                                </select>
                                @error('gender')
                                <span class="mt-2 text-danger">{{ $message }}</span>
                                @enderror
                                <p><b>Phone number: </b><input type="tel" name="phone"pattern="[0-9]{3}-[0-9]{7}" value="{{$admin ->phone}}"required></p>
                                <p><b>Date of Birth: </b><input type="date" name="dob" value="{{$admin ->dob}}"required></p>
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