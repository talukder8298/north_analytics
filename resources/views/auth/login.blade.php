<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | {{ config('app.name') }}</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/vendors_css.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/skin_color.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url({{ asset('backend/images/auth-bg/bg-1.jpg') }})">
    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">
            <div class="col-12">
                <div class="row justify-content-center no-gutters">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="bg-white rounded30 shadow-lg">
                            <div class="content-top-agile p-20 pb-0">
                                <h2 class="text-primary">North Analytics</h2>
                                <p class="mb-0">Sign in to continue browsing</p>
                            </div>
                            <div class="p-40">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                            </div>
                                            <input type="email" class="form-control pl-15 bg-transparent" name="email" placeholder="Enter email" required>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control pl-15 bg-transparent" name="password" placeholder="Password" required><br>
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="checkbox">
                                                <input type="checkbox" id="basic_checkbox_1" >
                                                <label for="basic_checkbox_1">Remember Me</label>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-danger mt-10">SIGN IN</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
                                <div class="text-center">
                                    <p class="mt-15 mb-0">Don't have an account? <a href="#" class="text-warning ml-5">Sign Up</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Vendor JS -->
<script src="{{ asset('backend/assets/js/vendors.min.js')}}"></script>
<script src="{{ asset('backend/assets/js/pages/chat-popup.js')}}"></script>
<script src="{{ asset('backend/assets/icons/feather-icons/feather.min.js')}}"></script>

</body>
</html>
