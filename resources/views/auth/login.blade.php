<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Hotel Dashboard Template</title>
    <link rel="shortcut icon" type="image/x-icon" href="admin/assets/img/favicon.png">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/plugins/fontawesome/css/all.min.css">
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
                        <h1>Login</h1>
                        <p class="account-subtitle">Access to our dashboard</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit"> {{ __('Login') }}</button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                        <div class="login-or"> <span class="or-line"></span> <span class="span-or">or</span> </div>
                        <div class="social-login"> <span>Login with</span> <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="#" class="google"><i class="fab fa-google"></i></a> </div>
                        <div class="text-center dont-have">Don’t have an account? <a href="{{route('register')}}">Register</a></div>
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
