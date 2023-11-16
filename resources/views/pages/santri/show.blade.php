<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
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
        <a href="{{ url('/') }}" class="back text-center p-2 mx-auto">
            <button class="btn">Kembali</button>
        </a>
        <h4 class="fw-bold py-3 mb-4 text-center">
            <span class="text-muted fw-light text">Daftar Perizinan Mahasantri
        </h4>
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-lg-12">
                            @include('notif')
                            <div class="table-responsive">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tujuan</th>
                                            <th>Waktu pengajuan</th>
                                            <th>Status Dosen</th>
                                            <th>Status Ustadz Dedy</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @forelse ($posts as $row)
                                            <tr>
                                                <td>{{ $no++ }} </td>
                                                <td>{{ $row->tujuan }}</td>
                                                <td>{{ $row->updated_at->format('Y-m-d') }}
                                                    <br>{{ $row->updated_at->format('H:i') }} WIB</td>
                                                <td>
                                                    @if (!empty($row->approval_u_fauzan) && !empty($row->approval_u_fajri))
                                                        @if ($row->approval_u_fauzan == 'TIDAK DISETUJUI' || $row->approval_u_fajri == 'TIDAK DISETUJUI')
                                                            TIDAK SETUJUI
                                                        @elseif ($row->approval_u_fauzan == 'DISETUJUI' && $row->approval_u_fajri == 'DISETUJUI')
                                                            DISETUJUI
                                                        @else
                                                            BELUM DIKONFIRMASI
                                                        @endif
                                                    @elseif (!empty($row->approval_u_febby) && !empty($row->approval_u_faruq))
                                                        @if ($row->approval_u_febby == 'TIDAK DISETUJUI' || $row->approval_u_faruq == 'TIDAK DISETUJUI')
                                                            TIDAK SETUJU
                                                        @elseif ($row->approval_u_febby == 'DISETUJUI' && $row->approval_u_faruq == 'DISETUJUI')
                                                            SETUJU
                                                        @else
                                                            BELUM DIKONFIRMASI
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($row)
                                                        {{ $row->category->name_category ?? 'Belum dikonfirmasi' }}
                                                    @else
                                                        Disetujui
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('posts.show', $row->id) }}">
                                                        <button class='btn btn-primary'>View</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan='4'>Tidak ada data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

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
