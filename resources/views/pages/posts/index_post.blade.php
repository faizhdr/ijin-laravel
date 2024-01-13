@extends('layouts.admin_template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Pages / </span>Daftar Perizinan
        </h4>
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="card-body">
                    <form action="/filter" method="GET">
                        <div class="d-flex mb-5 justify-content-end">
                            <div class="col-md-3">
                                <label>Start Date :</label>
                                <input type="date" name="start_date" class="form-control mt-1" required>
                            </div>
                            <div class="mt-4 ms-2">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                    <table id="example1" class='table table-striped'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama </th>
                                <th>Jurusan</th>
                                <th>Tujuan</th>
                                <th>Approval LVL 1</th>
                                <th>Approval LVL 2</th>
                                <th>Waktu Pengajuan</th>
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
                                    <td>{{ $row->user->name }}</td>
                                    <td>{{ $row->user->jurusan }}</td>
                                    <td>{{ $row->tujuan }}</td>
                                    <td>
                                        @if (!empty($row->approval_u_fauzan) && !empty($row->approval_u_fajri))
                                            @if ($row->approval_u_fauzan == 'TIDAK DISETUJUI' || $row->approval_u_fajri == 'TIDAK DISETUJUI')
                                                TIDAK SETUJU
                                            @elseif ($row->approval_u_fauzan == 'DISETUJUI' && $row->approval_u_fajri == 'DISETUJUI')
                                                SETUJU
                                            @else
                                                BELUM DIKONFIRMASI
                                            @endif
                                        @elseif (!empty($row->approval_u_febby) && !empty($row->approval_u_faruq))
                                            @if ($row->approval_u_febby == 'TIDAK DISETUJUI' || $row->approval_u_faruq == 'TIDAK DISETUJUI')
                                                TIDAK SETUJUI
                                            @elseif ($row->approval_u_febby == 'DISETUJUI' && $row->approval_u_faruq == 'DISETUJUI')
                                                SETUJUI
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
                                    <td>{{ $row->updated_at->format('Y-m-d') }}
                                        <br>{{ $row->updated_at->format('H:i') }} WIB
                                    </td>
                                    <td>
                                        <div class='d-flex justify-content-end'>
                                            <a href="{{ route('posts.edit', $row->id) }}">
                                                <button class='btn btn-primary'>Confirm</button>
                                            </a>
                                            &nbsp;

                                            <form onsubmit="return confirm('are you sure?')"
                                                action="{{ route('posts.destroy', $row->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class='btn btn-danger'>Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
