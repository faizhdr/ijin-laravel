<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perizinan App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/santri_index.css') }}" />
</head>

<body>
    <div class="container-xxl mt-3">

        <div class="mt-4 m-3">
            <div class="navbar d-flex justify-content-between mx-auto">
                @if (Auth::check())
                    <div>{{ auth()->user()->name }}</div>
                @endif
                <div>
                    <form onsubmit="return confirm('are you sure?')" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">
                            <img src="{{ asset('assets/img/icons/brands/logout.svg') }}" alt="">
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div>
            <a href="{{ url('/form') }}" class="text-center mx-auto">
                <div class="card mx-auto mt-4 p-1 pt-4 ">
                    <img class="mx-auto mb-3" src="{{ asset('assets/img/icons/brands/pengajuan.svg') }}" alt="">
                    <p>Pengajuan Perizinan</p>
                </div>
            </a>

            <a href="{{ url('/show') }}" class="text-center mx-auto">
                <div class="card mx-auto mt-4 p-1 pt-4 ">
                    <img class="mx-auto mb-3" src="{{ asset('assets/img/icons/brands/paper.svg') }}" alt="">
                    <p>Riwayat Perizinan</p>
                </div>
            </a>
        </div>
    </div>

</body>

</html>
