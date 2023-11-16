@extends('layouts.admin_template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Konfirmasi Perizinan</h4>

        <div class="row">
            @include('notif')
            <div class="col-md-12">
                <div class="card mb-4">
                    <form action="{{ route('posts.update', $edit->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="table-responsive m-3 mb-0">
                            <table class="table table-borderless w-25">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td> {{ $edit->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>NIM</td>
                                    <td>:</td>
                                    <td> {{ $edit->user->nim }}</td>
                                </tr>
                                <tr>
                                    <td>Jurusan</td>
                                    <td>:</td>
                                    <td> {{ $edit->user->jurusan }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td> {{ $edit->user->email }}</td>
                                </tr>
                                <tr>
                                    <td>No. Hp</td>
                                    <td>:</td>
                                    <td> {{ $edit->user->telp }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="card-body">
                            <div class='mb-2'>
                                <label for="tujuan" class="form-label">Tujuan</label>
                                <input type="text" class="form-control" id="tujuan" name="tujuan"
                                    value="{{ $edit->tujuan }}" placeholder="Tujuan
                                    "
                                    aria-describedby="defaultFormControlHelp" />
                                @error('description')
                                    <div class="error" style="position:absolute">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class='mb-2'>
                                <label for="jamkeluar" class="form-label">Jam Keluar</label>
                                <input type="time" class="form-control" id="jamkeluar" name="jamkeluar"
                                    value="{{ $edit->jamkeluar }}" placeholder="Jam Keluar"
                                    aria-describedby="defaultFormControlHelp" required />
                                @error('jamkeluar')
                                    <div class="error" style="position:absolute">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class='mb-2'>
                                <label for="jamkembali" class="form-label">Jam Kembali</label>
                                <input type="time" class="form-control" id="jamkembali" name="jamkembali"
                                    value="{{ $edit->jamkembali }}" placeholder="Jam Kembali"
                                    aria-describedby="defaultFormControlHelp" required />
                                @error('jamkembali')
                                    <div class="error" style="position:absolute">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class='mb-2'>
                                <label for="updated_at" class="form-label">Waktu Pengajuan</label>
                                <input type="timestamp" class="form-control" id="updated_at" name="updated_at"
                                    value="{{ $edit->updated_at }}" aria-describedby="defaultFormControlHelp" />
                                @error('updated_at')
                                    <div class="error" style="position:absolute">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class='mb-2'>
                                <label for="telp" class="form-label">No. Hp</label>
                                <input type="text" class="form-control" id="telp" name="telp"
                                    value="{{ $edit->user->telp }}"
                                    aria-describedby="defaultFormControlHelp"/>
                                @error('telp')
                                    <div class="error" style="position:absolute">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            <div class='mb-6'>
                                <label for="category" class="form-label">Status</label>
                                <select name="category" class="form-control" required>
                                    <option value="">Pilih Status</option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ $cat->id == $edit->categories_id ? 'selected' : '' }}>
                                            {{ $cat->name_category }}</option>
                                    @endforeach {}
                                </select>
                                @error('category')
                                    <div class="error" style="position:absolute">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>

                            <div>
                                <input type='submit' class='btn btn-primary' value="Update" id="save"
                                    name="update" />
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
