<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel='icon' href="{{ asset('assets/img/favicon/icon.svg') }}" type='image/x-icon' sizes="16x16" />
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</head>

<body>
    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3 shadow-lg">
                        <img src="{{ asset('assets/img/backgrounds/petik.png') }}" class="w-100"
                            style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="fw-bold">Form Perizinan Mahasantri</h3>

                            <form action="{{ route('posts.store') }}" method="POST" class="mt-4">
                                @csrf

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
                                        min="00:00" max="23:59" pattern="[0-2][0-9]:[0-5][0-9]"
                                        placeholder="Jam Keluar" aria-describedby="defaultFormControlHelp" required />
                                    @error('jamkeluar')
                                        <div class="error" style="position:absolute">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class='mb-2'>
                                    <label for="jamkembali" class="form-label">Jam Kembali</label>
                                    <input type="time" class="form-control" id="jamkembali" min="00:00"
                                        max="23:59" pattern="[0-2][0-9]:[0-5][0-9]" name="jamkembali"
                                        placeholder="Jam Kembali" aria-describedby="defaultFormControlHelp" required />
                                    @error('jamkembali')
                                        <div class="error" style="position:absolute">{{ $message }}</div>
                                    @enderror
                                </div>
                                <input type="hidden" name="category" value="3" />
                                <input type="hidden" name="approval_u_fauzan" value="BELUM DIKONFIRMASI" />
                                <input type="hidden" name="approval_u_fajri" value="BELUM DIKONFIRMASI" />
                                <input type="hidden" name="approval_u_febby" value="BELUM DIKONFIRMASI" />
                                <input type="hidden" name="approval_u_faruq" value="BELUM DIKONFIRMASI" />


                                <div class='mb-2'>
                                    <p><small>NB: <br>1. Perizinan Harus diketahui oleh Ustadz Dedy Wijaya <br>2.
                                            Perizinan harus diketahui oleh Satpam <br>3. Keputusan waktu semua
                                            tergantung keputusan Ustadz Dedy, harap masukan waktu yang sesuai.</small>
                                    </p>

                                </div>

                                <div class="d-flex mt-3">
                                    <div class="">
                                        <input type='submit' class='btn btn-primary mx-auto' value="Submit"
                                            id="save" onclick="ubahNilai()" name="save" />
                                    </div>
                                    <div class="mx-3">
                                        <a class='btn btn-secondary mx-auto' href="{{ url('/home') }}">Kembali</a>
                                    </div>
                                </div>
                            </form>
                            @include('sweetalert::alert')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <div class="container p-2 mt-2">
        <a href="{{ url('/') }}" class="text-center p-2 mx-auto">Kembali</a>
        <div class="card p-3 mx-auto mt-3" style="max-width: 500px">
            <img src="{{ asset('assets/img/favicon/favicon.png') }}" alt="" class="w-25 mx-auto d-block">
            
            <p class="display-6 fw-bold text-center">Form Perizinan Mahasantri</p>
            <form action="{{ route('posts.store') }}" method="POST" class="mt-4">
                @csrf
            
                <div class='mb-2'>
                    <label for="description" class="form-label">Tujuan</label>
                    <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan"
                        aria-describedby="defaultFormControlHelp" required />
                    @error('tujuan')
                        <div class="error" style="position:absolute">{{ $message }}</div>
                    @enderror
                </div>
                <div class='mb-2'>
                    <label for="jamkeluar" class="form-label">Jam Keluar</label>
                    <input type="time" class="form-control" id="jamkeluar" name="jamkeluar" min="00:00" max="23:59" pattern="[0-2][0-9]:[0-5][0-9]" placeholder="Jam Keluar"
                        aria-describedby="defaultFormControlHelp" required />
                    @error('jamkeluar')
                        <div class="error" style="position:absolute">{{ $message }}</div>
                    @enderror
                </div>
                <div class='mb-2'>
                    <label for="jamkembali" class="form-label">Jam Kembali</label>
                    <input type="time" class="form-control" id="jamkembali" min="00:00" max="23:59" pattern="[0-2][0-9]:[0-5][0-9]" name="jamkembali"
                        placeholder="Jam Kembali" aria-describedby="defaultFormControlHelp" required />
                    @error('jamkembali')
                        <div class="error" style="position:absolute">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="category" value="3" />
                <input type="hidden" name="approval_u_fauzan" value="BELUM DIKONFIRMASI" />
                <input type="hidden" name="approval_u_fajri" value="BELUM DIKONFIRMASI" />
                <input type="hidden" name="approval_u_febby" value="BELUM DIKONFIRMASI" />
                <input type="hidden" name="approval_u_faruq" value="BELUM DIKONFIRMASI" />
        

                <div class='mb-2'>
                    <p><small>NB: <br>1. Perizinan Harus diketahui oleh Ustadz Dedy Wijaya <br>2. Perizinan harus diketahui oleh Satpam <br>3. Keputusan waktu semua tergantung keputusan Ustadz Dedy, harap masukan waktu yang sesuai.</small> </p>
                     
                </div>

                <div class="text-center mt-3">
                    <input type='submit' class='btn btn-primary mx-auto' value="Submit" id="save" onclick="ubahNilai()" 
                        name="save" />
                </div>
            </form>
            @include('sweetalert::alert')

        </div>
    </div> --}}

</body>

</html>
