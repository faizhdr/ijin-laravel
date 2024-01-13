<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />


</head>

<body>
    <div class="container-xxl flex-grow-1 container-p-y">
        <a href="{{ url('/') }}" class="back text-center p-2 mx-auto">
            <button class="btn btn-secondary">Kembali</button>
        </a>
        <h4 class="fw-bold pt-5 mb-4 text-center">
            Daftar Perizinan Mahasantri
        </h4>
        <div class="card">
            @include('notif')
            <div class="card-body">
                <table id="example1" class='table table-striped'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tujuan</th>
                            <th>Waktu pengajuan</th>
                            <th>Status Dosen</th>
                            <th>Status Ustadz Dedy</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($posts as $row)
                            <tr>
                                <td>{{ $no++ }} </td>
                                <td>{{ $row->tujuan }}</td>
                                <td>{{ $row->updated_at->format('Y-m-d') }}
                                    <br>{{ $row->updated_at->format('H:i') }} WIB
                                </td>
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src={{ asset('plugins/datatables/jquery.dataTables.js') }}></script>
<script src={{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}></script>
<script src={{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}></script>
<script src={{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}></script>
<script src={{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}></script>
<script src={{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}></script>
<script src={{ asset('plugins/datatables-buttons/js/buttons.html5.js') }}></script>
<script src={{ asset('plugins/datatables-buttons/js/buttons.print.js') }}></script>
<script src={{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}></script>
<script src={{ asset('plugins/jszip/jszip.min.js') }}></script>
<script src={{ asset('plugins/pdfmake/pdfmake.min.js') }}></script>
<script src={{ asset('plugins/pdfmake/vfs_fonts.js') }}></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": false,

            //         {extend: 'pdfHtml5',
            //                 orientation: 'landscape',
            //                 pageSize: 'LEGAL', customize: function(doc) {
            //   doc.content[1].margin = [ 100, 0, 100, 0 ] //left, top, right, bottom
            // }} , 
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $("#example2").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": false,
            "buttons": ["copy", "excel", "pdf", "print", "colvis"]

            //         {extend: 'pdfHtml5',
            //                 orientation: 'landscape',
            //                 pageSize: 'LEGAL', customize: function(doc) {
            //   doc.content[1].margin = [ 100, 0, 100, 0 ] //left, top, right, bottom
            // }} , 
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        $("#example3").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["colvis"]

            //         {extend: 'pdfHtml5',
            //                 orientation: 'landscape',
            //                 pageSize: 'LEGAL', customize: function(doc) {
            //   doc.content[1].margin = [ 100, 0, 100, 0 ] //left, top, right, bottom
            // }} , 
        }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    });
</script>


</html>
