<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .back button {
            background-color: #086F83;
            border-radius: 5px;
            color: #FFFFFF;
            padding: 5px text-decoration: none;
        }

        .back button:hover {
            text-decoration: none;
            color: #FFFFFF;
        }
    </style>
</head>

<body>
    <div class="container-xxl flex-grow-1 container-p-y">
        <a href="{{ url('/show') }}" class="back text-center p-2 mx-auto">
            <button class="btn">Kembali</button>
        </a>
        <div class="row mt-2">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>

</html>
