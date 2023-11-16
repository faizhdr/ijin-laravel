<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        a {
            background-color:#086F83 ;
            border-radius: 5px;
            color: #FFFFFF ;
            padding: 5px
        }
        a:hover {
            text-decoration: none;
            color: #FFFFFF;
        }
    </style>
</head>

<body>

    <div class="container p-2 mt-2">
        <a href="{{ url('/') }}" class="text-center p-2 mx-auto">Kembali</a>
        <div class="card p-3 mx-auto mt-3" style="max-width: 500px">
            <img src="{{ asset('assets/img/favicon/favicon.png') }}" alt="" class="w-25 mx-auto d-block">
            
            <h3 class="text-center">Form Perizinan Mahasantri</h3>
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
    </div>

</body>

</html>
