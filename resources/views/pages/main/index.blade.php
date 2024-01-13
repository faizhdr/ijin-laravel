@extends('layouts.admin_template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <h4 class="card-header mb-3">Daftar Perizinan Mahasantri</h4>
                    <div class="card-body">
                        <table id="example2" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Mahasantri</th>
                                    <th>NIM</th>
                                    <th>Jurusan</th>
                                    <th>Jumlah Izin</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->nim }}</td>
                                        <td>{{ $user->jurusan }}</td>
                                        <td>{{ $user->countPermissions() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
@endsection
