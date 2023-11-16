<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perizinan App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #EAEBEC;
        }

        .img img {
            max-width: 200px;
        }

        .title h3 {
            font-size: 24px;
        }

        .card {
            max-width: 400px;
            background-color: #086F83;
            color: #FFFFFF;
            border-radius: 10px;
        }

        a {
            color: white
        }

        a:hover {
            text-decoration: none;
            color: rgb(219, 219, 219);
        }

        button {
            width: 200px;
            background-color: #FFFFFF;
            border-radius: 5px;
            color: #086F83;
        }

        button:hover {
            text-decoration: none;
            color: #086F83;
        }

        .remember {
            background-color: #086F83;
            color: #FFFFFF;
        }

        .remember:hover {
            text-decoration: none;
            color: #FFFFFF;
        }
    </style>
</head>

<body>
    <div class="container-xxl mt-3 m-3">
        <div class="img">
            <img src="{{ asset('assets/img/favicon/favicon.png') }}" alt="logo-petik" class="mx-auto d-block">
        </div>

        <div class="title d-flex justify-center align-items-center mt-4">
            <h3 class="mx-auto">Aplikasi Perizinan Mahasantri</h3>
        </div>

        <div class="title d-flex justify-center align-items-center mt-4">
            <h5 class="mx-auto">Login</h5>
        </div>

        <div class="card mx-auto mt-4 p-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />

                    <x-text-input id="email" class="form-control" type="email" placeholder="Masukkan Email"
                        name="email" :value="old('email')" required autofocus />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="form-control" type="password" name="password"
                        placeholder="Masukkan Password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div> --}}

                <div class="d-flex justify-center mt-3">
                    {{-- @if (Route::has('password.request'))
                        <a class="remember underline text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif --}}

                    <button class="btn mx-auto m-2">
                        {{ __('Log in') }}
                    </button>
                </div>

                <div class="flex items-center justify-content-center mt-4">
                    <p class="text-center">Don't have an account?<a href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a></p>
                </div>
            </form>
        </div>
    </div>

</body>


</html>
