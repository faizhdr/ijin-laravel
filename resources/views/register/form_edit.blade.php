@extends('layouts.admin_template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-lg-12 mb-4 order-0">
                    <!-- Basic Layout -->
                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4 class="mb-4">Edit User</h4>
                            </div>
                            <div class="card-body">
                                @foreach ($edit as $row)
                                <form method="POST" action="{{ route('user.update',$row->id) }}">
                                    @csrf
                                    @method('patch')
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="idNama">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control
                                            @error('name')
                                            is-invalid
                                            @enderror" id="idNama" value="{{ old('name', $row->name) }}" />
                                             {{-- pesan error --}}
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="idRole">Role</label>
                                        <div class="col-sm-10">
                                            <select name="role" id="idRole" class="form-control
                                            @error('role')
                                            is-invalid
                                            @enderror" >
                                                <option selected disabled>Pilih Role</option>
                                                <option value="direktur" {{ old('role', $row->role) == "direktur" ? 'selected' : null }}>Direktur</option>
                                                <option value="tahfidz" {{ old('role', $row->role) == "tahfidz" ? 'selected' : null }}>Tahfidz</option>
                                                <option value="dosen" {{ old('role', $row->role) == "dosen" ? 'selected' : null }}>Dosen</option>
                                                <option value="alumni" {{ old('role', $row->role) == "alumni" ? 'selected' : null }}>Alumni</option>
                                                <option value="santri" {{ old('role', $row->role) == "santri" ? 'selected' : null }}>Santri</option>
                                            </select>
                                            {{-- pesan error --}}
                                            @error('role')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="idEmail">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" value="{{ old('email', $row->email) }}" name="email" class="form-control
                                            @error('email')
                                            is-invalid
                                            @enderror" id="idEmail"/>
                                            {{-- pesan error --}}
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="idPssword">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control
                                            @error('password')
                                            is-invalid
                                            @enderror" id="idPssword"/>
                                            {{-- pesan error --}}
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="idJurusan">Jurusan</label>
                                        <div class="col-sm-10">
                                            <select name="jurusan" id="idJurusan" class="form-control
                                            @error('jurusan')
                                            is-invalid
                                            @enderror">
                                                <option selected disabled>Pilih Jurusan</option>
                                                <option value="-" {{ old('jurusan', $row->jurusan) == "-" ? 'selected' : null }}>Tidak ada</option>
                                                <option value="Digital Marketing" {{ old('jurusan', $row->jurusan) == "Digital Marketing" ? 'selected' : null }}>Digital Marketing</option>
                                                <option value="Pengembangan Perangkat Lunak" {{ old('jurusan', $row->jurusan) == "Pengembangan Perangkat Lunak" ? 'selected' : null }}>Pengembangan Perangkat Lunak</option>
                                            </select>
                                            {{-- pesan error --}}
                                            @error('jurusan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="idTelp">No Telp</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('telp', $row->telp) }}" name="telp" class="form-control
                                            @error('telp')
                                            is-invalid
                                            @enderror" id="idTelp"/>
                                            {{-- pesan error --}}
                                            @error('telp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="idNim">NIM</label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('nim', $row->nim) }}" name="nim" class="form-control
                                            @error('nim')
                                            is-invalid
                                            @enderror" id="idNim"/>
                                        {{-- pesan error --}}
                                        @error('nim')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-8 mt-5">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
               
            </div>
        
    </div>
@endsection
