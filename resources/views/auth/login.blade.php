<!DOCTYPE html>
<html lang="en">
<base href="/">
<head>
    <meta charset="utf-8" />
    <title>Fast Food</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <link rel="shortcut icon" href="admin1/assets/images/favicon.ico">
    <link href="admin1/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="admin1/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="admin1/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

</head>

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

<div class="auth-fluid">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
            <div class="card-body">

                <!-- Logo -->
                <div class="auth-brand text-center text-lg-start">
                    <a href="{{ route('/') }}" class="logo-dark">
                        <span><img src="admin1/assets/images/logo-dark.png" alt="" height="18"></span>
                    </a>
                    <a href="index.html" class="logo-light">
                        <span><img src="admin1/assets/images/logo.png" alt="" height="18"></span>
                    </a>
                </div>

                <!-- title-->
                <h4 class="mt-0">Sign In</h4>
                <p class="text-muted mb-4">Enter your email address and password to access account.</p>

                <!-- form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email / Phone</label>
                        <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <a href="pages-recoverpw-2.html" class="text-muted float-end"><small>{{ __('Forgot Your Password?') }}</small></a>
                        <label for="password" class="form-label">Password</label>
                        <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="d-grid mb-0 text-center">
                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> {{ __('Login') }} </button>
                    </div>
                    <!-- social-->
                    <div class="text-center mt-4">
                        <p class="text-muted font-16">Sign in with</p>
                        <ul class="social-list list-inline mt-3">
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="href="{{ route('socialite.redirect',['provider' => 'google']) }}"" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                            </li>
                        </ul>
                    </div>
                </form>
                <!-- end form-->

                <!-- Footer-->
                <footer class="footer footer-alt">
                    <p class="text-muted">Don't have an account? <a href="pages-register-2.html" class="text-muted ms-1"><b>Sign Up</b></a></p>
                </footer>

            </div> <!-- end .card-body -->
        </div> <!-- end .align-items-center.d-flex.h-100-->
    </div>
    <!-- end auth-fluid-form-box-->

    <!-- Auth fluid right content -->
    <div class="auth-fluid-right text-center">
        <div class="auth-user-testimonial">
            <h2 class="mb-3">I love the color!</h2>
            <p class="lead"><i class="mdi mdi-format-quote-open"></i> It's a elegent templete. I love it very much! . <i class="mdi mdi-format-quote-close"></i>
            </p>
            <p>
                - Hyper Admin User
            </p>
        </div> <!-- end auth-user-testimonial-->
    </div>
    <!-- end Auth fluid right content -->
</div>
<!-- end auth-fluid-->

<!-- bundle -->
<script src="admin1/assets/js/vendor.min.js"></script>
<script src="admin1/assets/js/app.min.js"></script>

</body>

</html>
