<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Hotel Dashboard Template</title>
    <link rel="shortcut icon" type="image/x-icon" href="admin/assets/img/favicon.png">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="admin/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="admin/assets/css/feathericon.min.css">
    <link rel="stylesheet" href="admin/assets/plugins/morris/morris.css">
    <link rel="stylesheet" href="admin/assets/css/style.css"> </head>

<body>
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left"> <img class="img-fluid" src="admin/assets/img/logo.png" alt="Logo"> </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1 class="mb-3">Register</h1>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <input placeholder="Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block" type="submit">{{ __('Register') }}</button>
                            </div>

                        </form>
                        <div class="login-or"> <span class="or-line"></span> <span class="span-or">or</span> </div>
                        <div class="social-login">
                            <span>Register with</span>
                            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="google"><i class="fab fa-google"></i></a> </div>
                        <div class="text-center dont-have">Already have an account? <a href="{{ route('login') }}">Login</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="admin/assets/js/jquery-3.5.1.min.js"></script>
<script src="admin/assets/js/popper.min.js"></script>
<script src="admin/assets/js/bootstrap.min.js"></script>
<script src="admin/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="admin/assets/js/script.js"></script>
</body>
