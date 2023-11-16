@extends('layouts.admin_template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <h3 class="card-title text-black text-center m-4">Jumlah Perizinan Mahasantri</h3>
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th>Nama Mahasantri</th>
                                            <th>NIM</th>
                                            <th>Jurusan</th>
                                            <th>Jumlah Izin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->nim}}</td>
                                                <td>{{ $user->jurusan}}</td>
                                                <td>{{ $user->countPermissions() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
