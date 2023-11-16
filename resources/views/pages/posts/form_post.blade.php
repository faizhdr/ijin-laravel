@extends('layouts.admin_template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Tambah Perizinan</h4>

        <div class="row">
            @include('notif')
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Tambah Perizinan</h5>
                    <div class="card-body">
                        {{-- display error --}}
                        {{-- @if ($errors->any())
                            {!! implode('', $errors->all('<div style="color:red">:message</div>')) !!}
                        @endif --}}

                        <form action="{{ route('posts.store') }}" method="POST">
                            @csrf
                            <div class='mb-2'>
                                <label for="title" class="form-label">Nama Mahasantri</label>
                                <input type="text" class="form-control" id="name" name="title"
                                    placeholder="Nama Mahasantri" aria-describedby="defaultFormControlHelp" required />
                                @error('title')
                                    <div class="error" style="position:absolute">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class='mb-2'>
                                <label for="description" class="form-label">Tujuan</label>
                                <input type="text" class="form-control" id="tujuan" name="tujuan"
                                    placeholder="Tujuan" aria-describedby="defaultFormControlHelp" required />
                                @error('tujuan')
                                    <div class="error" style="position:absolute">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class='mb-2'>
                                <label for="jamkeluar" class="form-label">Jam Keluar</label>
                                <input type="time" class="form-control" id="jamkeluar" name="jamkeluar"
                                    placeholder="Jam Keluar" aria-describedby="defaultFormControlHelp" required />
                                @error('jamkeluar')
                                    <div class="error" style="position:absolute">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class='mb-2'>
                                <label for="jamkembali" class="form-label">Jam Kembali</label>
                                <input type="time" class="form-control" id="jamkembali" name="jamkembali"
                                    placeholder="Jam Kembali" aria-describedby="defaultFormControlHelp" />
                                @error('jamkembali')
                                    <div class="error" style="position:absolute">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div>
                                <input type='submit' class='btn btn-primary' value="Save" id="save"
                                    name="save" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
