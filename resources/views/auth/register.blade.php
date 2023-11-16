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
            <h5 class="mx-auto">Register</h5>
        </div>

        <div class="card mx-auto mt-4 p-4 mb-5 ">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Nama')" />

                    <x-text-input id="name" class="block mt-1 w-full form-control" type="text" name="name"
                        :value="old('name')" placeholder="Masukkan Nama" required autofocus />

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />

                    <x-text-input id="email" class="block mt-1 w-full form-control" placeholder="Masukkan Email" type="email"
                        name="email" :value="old('email')" required />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- NIM -->
                <div class="mt-4">
                    <x-input-label for="nim" :value="__('NIM')" />

                    <x-text-input id="nim" class="block mt-1 w-full form-control" placeholder="Masukkan Nim" type="text"
                        name="nim" :value="old('nim')" required />

                    <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                </div>

                <!-- Jurusan -->
                <div class="mt-4">
                    <x-input-label for="jurusan" :value="__('Jurusan')" />
                    <select name="jurusan" id="jurusan" class="form-control">
                        <option selected>Pilih Jurusan</option>
                        <option value="Pengembangan Perangkat Lunak">Pengembangan Perangkat Lunak</option>
                        <option value="Digital Marketing">Digital Marketing</option>
                    </select>
                    <x-input-error :messages="$errors->get('jurusan')" class="mt-2" />
                </div>

                <!-- Telpon -->
                <div class="mt-4">
                    <x-input-label for="telp" :value="__('Nomor Hp')" />

                    <x-text-input id="telp" class="block mt-1 w-full form-control" placeholder="Masukkan Nomor Hp"
                        type="text" name="telp" :value="old('telp')" required />

                    <x-input-error :messages="$errors->get('telp')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full form-control" type="password" name="password"
                        placeholder="Masukkan Password" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full form-control" type="password"
                        placeholder="Masukkan Konfirmasi Password" name="password_confirmation" required />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="d-flex items-center mt-4">

                    <button class="btn mx-auto m-2" onclick="ubahNilai()">
                        {{ __('Register') }}
                    </button>
                </div>
                <div class="flex items-center justify-content-center mt-4">
                    <p class="text-center">Already have an account?<a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a></p>
                </div>
            </form>
        </div>
    </div>

</body>

<script>
    function ubahNilai() {
        var inputValue = document.getElementById("telp").value;

        // Periksa apakah ada 0 diinputan paling depan
        if (inputValue.charAt(0) === '0') {
            // Jika ya, ganti 0 dengan 62
            inputValue = '62' + inputValue.substring(1);
        } else if (inputValue.indexOf('620') === 0) {
            // Jika dimulai dengan "620", ganti dengan "62"
            inputValue = '62' + inputValue.substring(3);
        } else if (inputValue.indexOf('62') !== 0) {
            // Jika tidak dimulai dengan "62", tambahkan "62" di depan nilai
            inputValue = '62' + inputValue;
        }
        document.getElementById("telp").value = inputValue;
    }
</script>

</html>
