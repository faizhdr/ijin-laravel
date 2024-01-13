@extends('layouts.admin_template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Pages /</span> User
        </h4>
        <h2 class="card-title text-black text-center"></h2>
        <div class="card">
            <div class="card-header">
                <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah User</a>
            </div>
            <div class="card-body">
                <table id="example3" class='table table-striped'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama </th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Jurusan</th>
                            <th>No Telp</th>
                            <th>NIM</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($user as $row)
                            <tr>
                                <td>{{ $no++ }} </td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->role }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->jurusan }}</td>
                                <td>{{ $row->telp }}</td>
                                <td>{{ $row->nim }}</td>

                                <td>
                                    <form method="POST" action="{{ route('user.destroy', $row->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('user.edit', $row->id) }}" class="btn btn-sm btn-primary m-1"><i
                                                class='bx bxs-pencil'></i></a>
                                        <button type="submit" class="btn btn-sm btn-danger delete m-1"><i
                                                class='bx bxs-trash-alt'></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
