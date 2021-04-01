


<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Lazabii Admin Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="">
	<link href="{{asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href=""><img src="" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form method="POST"action="{{ route('admin.login') }}">
                                    @csrf
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email"value="">
                                        </div>
                                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password"value="">
                                        </div>
                                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                               <div class="custom-control custom-checkbox ml-1">
													<input type="checkbox" class="custom-control-input" name="remember"id="remember"{{ old('remember') ? 'checked' : '' }}>
													<label class="custom-control-label" for="basic_checkbox_1">Remember me</label>
												</div>
                                            </div>
                                @if (Route::has('password.request'))
                                            <div class="form-group">
                                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                                            </div>  
                                            @endif
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('vendor/global/global.min.js')}}"></script>
	<script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/deznav-init.js')}}"></script>
</body>
</html>