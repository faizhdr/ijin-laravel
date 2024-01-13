<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perizinan App</title>
    <link rel='icon' href="{{ asset('assets/img/favicon/icon.svg') }}" type='image/x-icon' sizes="16x16" />
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <main>
        <div class="container py-4">
            {{-- <header class="pb-3 mb-4 border-bottom">
                    <img src="{{ asset('assets/img/logo/logo.svg') }}" alt="">
            </header> --}}

            <header class="d-flex flex-wrap align-items-center justify-content-between pb-3 mb-4 border-bottom">
                <a href="/"
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <img src="{{ asset('assets/img/logo/logo-samll.svg') }}" class="img-fluid" alt="">
                </a>

                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="{{ url('logout') }}" onclick="return confirm('are you sure?')"
                            class="nav-link btn-primary" aria-current="page"><i class='bx-fw bx bx-log-out'></i>Logout
                        </a></li>
                </ul>
            </header>

            <div class="p-5 mb-4 bg-body-tertiary rounded-3">
                @if (Auth::user()->role == 'direktur' || Auth::user()->role == 'tahfidz' || Auth::user()->role == 'dosen' || Auth::user()->role == 'alumni')
                    <div class="container-fluid py-5">
                        <h1 class="display-6 fw-bold">Assalamualaikum, {{ auth()->user()->name }} <img width="45"
                                height="45" class="mb-3"
                                src="https://img.icons8.com/external-lineal-color-zulfa-mahendra/96/external-avatar-profession-avatar-4-lineal-color-zulfa-mahendra-5.png" />
                        </h1>

                        <p class="col-md-9 fs-4">Untuk Melanjutkan ke Halaman Admin Klik Tombol Berikut.</p>
                        <a href="{{ url('/main') }}" class="btn btn-primary rounded-pill" type="button">Dashboard
                            &raquo;</a>
                    </div>
                @elseif(Auth::user()->role == 'santri')
                    <div class="container-fluid">
                        <h1 class="display-6 fw-bold">Assalamualaikum, {{ auth()->user()->name }} <img width="45"
                                height="45" class="mb-3"
                                src="https://img.icons8.com/external-lineal-color-zulfa-mahendra/96/external-avatar-profession-avatar-4-lineal-color-zulfa-mahendra-5.png" />
                        </h1>
                        <p class="col-md-9">Pengajuan perizinan merujuk pada proses dimana seseorang atau suatu entitas
                            mengajukan izin atau persetujuan resmi.</p>
                    </div>
                @endif
            </div>

            <div class="row align-items-md-stretch">
                @if (Auth::user()->role == 'direktur' || Auth::user()->role == 'tahfidz' || Auth::user()->role == 'dosen')
                    <div class="col-md-6 mb-4">
                        <div class="d-flex align-items-center p-5 text-bg-dark rounded-3 ">
                            <div class="p-3 me-2">
                                <h1>{{ $jumlahData2 }}</h1>
                            </div>
                            <div class="d-flex justify-content-between align-items-end w-100 flex-wrap gap-2">
                                <div class="d-flex flex-column">
                                    <span>({{ Carbon\Carbon::today()->translatedFormat('l') }}, {{ Carbon\Carbon::today()->translatedFormat('d F Y') }})</span>
                                    <h5 class="mb-0">Mahasantri yang izin hari ini<span class="badge badge-pill badge-primary text-primary">(sudah di approval)</span></h5>
                                </div>
                                <a href="" class="text-primary">Lihat detail &raquo;</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex align-items-center p-5 bg-body-tertiary border rounded-3 ">
                            <div class="p-3 me-2">
                                <h1>{{ $jumlahData }}</h1>
                            </div>
                            <div class="d-flex justify-content-between align-items-end w-100 flex-wrap gap-2">
                                <div class="d-flex flex-column">
                                    <span>({{ Carbon\Carbon::today()->translatedFormat('l') }}, {{ Carbon\Carbon::today()->translatedFormat('d F Y') }})</span>
                                    <h5 class="mb-0">Mahasantri yang izin hari ini<span class="badge badge-pill badge-primary text-danger">(belum di approval)</span></h5>
                                </div>
                                <a href="" class="text-primary">Lihat detail &raquo;</a>
                            </div>
                        </div>
                    </div>
                @elseif(Auth::user()->role == 'santri')
                    <div class="col-md-6 mb-4">
                        <div class=" p-5 text-bg-dark rounded-3 ">
                            <h2><i class='bx-fw bx bxs-user-check'></i>Pengajuan Perizinan</h2>
                            <p>Calon pemohon perizinan harus mengisi formulir dan informasi yang diperlukan sesuai
                                dengan persyaratan pihak berwenang.</p>
                            <a class="btn btn-outline-light" href="{{ url('/form') }}">Pengajuan Perizinan &raquo;</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class=" p-5 bg-body-tertiary border rounded-3">
                            <h2> <i class='bx-fw bx bx-history'></i>Riwayat Perizinan</h2>
                            <p>Rekam jejak atau catatan yang mencatat semua informasi terkait perizinan yang diberikan
                                atau diterima oleh individu </p>
                            <a class="btn btn-outline-secondary" href="{{ url('/show') }}">Riwayat Perizinan
                                &raquo;</a>
                        </div>
                    </div>
                @endif
            </div>

            {{-- <footer class="pt-3 mt-4 text-body-secondary border-top">
                &copy; 2023
            </footer> --}}
        </div>
    </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>
