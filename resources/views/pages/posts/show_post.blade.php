<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel='icon' href="{{ asset('assets/img/favicon/icon.svg') }}" type='image/x-icon' sizes="16x16" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
</head>

<body>
    <div class="container-xxl flex-grow-1 container-p-y">
        <a href="{{ url('/show') }}" class="back text-center mb-3 ">
            <button class="btn btn-secondary">Kembali</button>
        </a>
        <div class="mt-4">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card mx-auto" style="max-width: 450px;">
                    <div class="img mt-2">
                        <img src="{{ asset('assets/img/favicon/favicon.png') }}" style="max-width: 200px"
                            alt="logo-petik" class="mx-auto d-block">
                    </div>
                    <h4 class="card-title text-center">Kartu Perizinan Mahasantri</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td> {{ $posts->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>NIM</td>
                                    <td>:</td>
                                    <td> {{ $posts->user->nim }}</td>
                                </tr>
                                <tr>
                                    <td>Jurusan</td>
                                    <td>:</td>
                                    <td> {{ $posts->user->jurusan }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td> {{ $posts->user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Hp</td>
                                    <td>:</td>
                                    <td> {{ $posts->user->telp }}</td>
                                </tr>
                                <tr>
                                    <td>Status Dosen</td>
                                    <td>:</td>
                                    <td>
                                        @if (!empty($posts->approval_u_fauzan) && !empty($posts->approval_u_fajri))
                                            @if ($posts->approval_u_fauzan == 'TIDAK DISETUJUI' || $posts->approval_u_fajri == 'TIDAK DISETUJUI')
                                                TIDAK SETUJU
                                            @elseif ($posts->approval_u_fauzan == 'DISETUJUI' && $posts->approval_u_fajri == 'DISETUJUI')
                                                SETUJU
                                            @else
                                                BELUM DIKONFIRMASI
                                            @endif
                                        @elseif (!empty($posts->approval_u_febby) && !empty($posts->approval_u_faruq))
                                            @if ($posts->approval_u_febby == 'TIDAK DISETUJUI' || $posts->approval_u_faruq == 'TIDAK DISETUJUI')
                                                TIDAK SETUJUI
                                            @elseif ($posts->approval_u_febby == 'DISETUJUI' && $posts->approval_u_faruq == 'DISETUJUI')
                                                DISETUJUI
                                            @else
                                                BELUM DIKONFIRMASI
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status Ustadz Dedy</td>
                                    <td>:</td>
                                    <td>
                                        @if ($posts)
                                            {{ $posts->category->name_category ?? 'Belum dikonfirmasi' }}
                                        @else
                                            Disetujui
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
