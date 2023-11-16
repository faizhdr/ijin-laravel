@extends('layouts.admin_template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Pages /</span> Perizinan DM
        </h4>
        <div class="row">
            <h2 class="card-title text-black text-center">Daftar Perizinan DM</h2>
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">

                            <div class="card-body">
                                <form action="/filterdm" method="GET">
                                    <div class="d-flex justify-content-end">
                                        <div class="col-md-3">
                                            <label>Start Date :</label>
                                            <input type="date" name="start_date" class="form-control mt-1" required>
                                        </div>
                                        <div class="mt-4 ms-2">
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama </th>
                                            <th>Tujuan</th>
                                            <th>Approval</th>
                                            <th>Waktu Pengajuan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @forelse ($posts as $row)
                                            <tr>
                                                <td>{{ $no++ }} </td>
                                                <td>{{ $row->user->name }}</td>
                                                <td>{{ $row->tujuan }}</td>
                                                <td>
                                                    @if ($row->approval_u_febby == 'TIDAK DISETUJUI' || $row->approval_u_faruq == 'TIDAK DISETUJUI')
                                                        TIDAK SETUJUI
                                                    @elseif ($row->approval_u_febby == 'DISETUJUI' && $row->approval_u_faruq == 'DISETUJUI')
                                                        DISETUJUI
                                                    @else
                                                        BELUM DIKONFIRMASI
                                                    @endif
                                                </td>
                                                <td>{{ $row->updated_at->format('Y-m-d') }}
                                                    <br>{{ $row->updated_at->format('H:i') }} WIB
                                                </td>
                                                <td>
                                                    <div class='d-flex justify-content-end'>
                                                        <a href="{{ route('dm_class.edit', $row->id) }}">
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
@endsection
