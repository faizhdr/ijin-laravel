@extends('layouts.admin_template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-lg-12 mb-4 order-0">
                    <!-- Basic Layout -->
                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4 class="mb-4">Tambah User</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('user.store') }}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="idNama">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control
                                            @error('name')
                                            is-invalid
                                            @enderror" id="idNama" value="{{ old('name') }}" placeholder="Fulan" />
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
                                                <option value="direktur" @if (old('role') == "direktur") {{ 'selected' }} @endif>Direktur</option>
                                                <option value="tahfidz" @if (old('role') == "tahfidz") {{ 'selected' }} @endif>Tahfidz</option>
                                                <option value="dosen" @if (old('role') == "dosen") {{ 'selected' }} @endif>Dosen</option>
                                                <option value="alumni" @if (old('role') == "alumni") {{ 'selected' }} @endif>Alumni</option>
                                                <option value="santri" @if (old('role') == "santri") {{ 'selected' }} @endif>Santri</option>
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
                                            <input type="email" value="{{ old('email') }}" name="email" class="form-control
                                            @error('email')
                                            is-invalid
                                            @enderror" id="idEmail"
                                                placeholder="example@gmail.com" />
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
                                            <input type="password" value="{{ old('password') }}" name="password" class="form-control
                                            @error('password')
                                            is-invalid
                                            @enderror" id="idPssword"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
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
                                                <option value="-" @if (old('jurusan') == "-") {{ 'selected' }} @endif>Tidak ada</option>
                                                <option value="Digital Marketing" @if (old('jurusan') == "Digital Marketing") {{ 'selected' }} @endif>Digital Marketing</option>
                                                <option value="Pengembangan Perangkat Lunak" @if (old('jurusan') == "Pengembangan Perangkat Lunak") {{ 'selected' }} @endif>Pengembangan Perangkat Lunak</option>
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
                                            <input type="text" value="{{ old('telp') }}" name="telp" class="form-control
                                            @error('telp')
                                            is-invalid
                                            @enderror" id="idTelp"
                                            placeholder="6281828928932" />
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
                                            <input type="number" value="{{ old('nim') }}" name="nim" class="form-control
                                            @error('nim')
                                            is-invalid
                                            @enderror" id="idNim"
                                            placeholder="2301001" />
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
                            </div>
                        </div>
                    </div>
               
            </div>
        
    </div>
@endsection
