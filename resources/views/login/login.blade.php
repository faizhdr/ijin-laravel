<!DOCTYPE html>
<html lang="en" class="light-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Perizinan App</title>
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/img/favicon/icon.svg') }}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    {{-- Style CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style/theme_default.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style/index.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style/page-auth.css') }}" />

    {{-- Helpers --}}
    <script src="{{ asset('assets/js/page/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/page/template-customizer.js') }}"></script>
    <script src="{{ asset('assets/js/page/config.js') }}"></script>
</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                   <img src="{{ asset('assets/img/logo/logo.svg') }}" alt="">
                                </span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Perizinan Mahasantri 👋</h4>
                        <p class="mb-4">Please sign-in to your account and start the adventure</p>

                        <form id="formAuthentication" class="mb-3" action="{{ url('login/proses') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control
                                    @error('email')
                                    is-invalid
                                    @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="Enter your email" autofocus>
                                {{-- pesan error --}}
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge bg-transparent">
                                    <input type="password" id="password" class="form-control
                                    @error('password')
                                    is-invalid
                                    @enderror" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    {{-- pesan error --}}
                                    @error('password')
                                        <div class="invalid-feedback ">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me">
                                    <label class="form-check-label" for="remember-me">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="auth-register-basic.html">
                                <span>Create an account</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
    <!-- / Content -->

</body>

<script src="{{ asset('assets/js/page/jquery.js') }}"></script>
<script src="{{ asset('assets/js/page/popper.js') }}"></script>
<script src="{{ asset('assets/js/page/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/page/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/js/page/hammer.js') }}"></script>
<script src="{{ asset('assets/js/page/i18n.js') }}"></script>
<script src="{{ asset('assets/js/page/typehead.js') }}"></script>
<script src="{{ asset('assets/js/page/menu.js') }}"></script>

<script src="{{ asset('assets/js/form-validation/popular.min.js') }}"></script>
<script src="{{ asset('assets/js/form-validation/index.min.js') }}"></script>
<script src="{{ asset('assets/js/form-validation/auto-focus.min.js') }}"></script>

<script src="{{ asset('assets/js/page/main.js') }}"></script>
<script src="{{ asset('assets/js/page/pages-auth.js') }}"></script>



</html>
