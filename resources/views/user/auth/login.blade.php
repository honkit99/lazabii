@extends('user.layouts.contentHF')

@section('contents')
    <div class="col-md-6">
        <div class="page-title">
            <h1>Shop List</h1>
        </div>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb justify-content-md-end">
            <li class="breadcrumb-item "><a href="index-4.html" class="color_white">Home</a></li>
            <li class="breadcrumb-item active">Login</li>
        </ol>
    </div>
@endsection

@section('contenthf')
<!-- START MAIN CONTENT -->
<div class="main_content">
    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Login</h3>
                            </div>
                            <form method="POST" action="{{ route('user.login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control @error('password') is-invalid @enderror" name="email" placeholder="Your Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                            <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                        </div>
                                    </div>
                                    <a href="login.html#">Forgot password?</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="login">Log in</button>
                                </div>
                            </form>
                            <div class="different_login">
                                <span> or</span>
                            </div>
                            <ul class="btn-login list_none text-center">
                                <li><a href="login.html#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                <li><a href="login.html#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                            </ul>
                            <div class="form-note text-center">Don't Have an Account? <a href="signup.html">Sign up now</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->
@endsection

