<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f0f8f7;
            /* Warna latar belakang hijau muda */
        }

        .container {
            color: #006400;
            /* Warna teks hijau tua */
        }

        .card {
            background-color: #fff;
            /* Warna latar belakang card putih */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Bayangan card untuk tampilan lebih baik */
        }

        .btn-primary {
            background-color: #006400;
            /* Warna tombol hijau tua */
            border-color: #006400;
            /* Warna border tombol hijau tua */
        }

        .btn-primary:hover {
            background-color: #008000;
            /* Warna tombol saat cursor diarahkan menjadi hijau lebih terang */
            border-color: #008000;
            /* Warna border tombol saat cursor diarahkan menjadi hijau lebih terang */
        }

        a {
            color: #006400;
            /* Warna tautan hijau tua */
        }

        a:hover {
            color: #008000;
            /* Warna tautan saat cursor diarahkan menjadi hijau lebih terang */
        }

        .login-image {
            width: 100%;
            max-width: 400px;
            /* Lebar maksimum gambar */
            height: auto;
            /* Tinggi otomatis sesuai proporsi gambar */
            margin-right: 20px;
            /* Jarak kanan gambar dari formulir */
        }

        .login-image {
            background-image: url('https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            height: 100%;
        }

        @media (max-width: 992px) {
            .login-image {
                display: none;
                /* Menghilangkan gambar pada layar kecil */
            }
        }
    </style>
</head>

<body>

    <div class="container ">
        @if (Session::get('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Registrasi Gagal!</strong> {{ Session::get('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <div class="container" style="margin-top: 60px;">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <img src="https://images.unsplash.com/photo-1529042410759-befb1204b468?q=80&w=1972&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Register Image" class="login-image">
                            </div>
                            <div class="col-md-6">
                                <h3 class="card-title text-center mb-4">Daftar</h3>
                                <form action="{{ route('postRegister') }}" method="POST">
                                    <!-- Remaining form content -->
                                    @csrf
                                    <div class="form-group mt-4">
                                        <label for="name" class="text-secondary">Nama</label>
                                        <input type="text" id="name" class="form-control border border-secondary form-control-lg" name="name" required value="{{ old('name') }}">
                                        <span>
                                            @error('name')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="email" class="text-secondary">Email</label>
                                        <input type="email" id="email" class="form-control border border-secondary form-control-lg" name="email" required value="{{ old('email') }}">
                                        <span>
                                            @error('email')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label class="text-secondary">Jenis Kelamin</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenisKelamin" value="Laki-laki" id="inlineRadio1">
                                            <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenisKelamin" value="Perempuan" id="inlineRadio2">
                                            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                        </div>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="alamat" class="text-secondary">Alamat </label>
                                        <textarea type="text" id="alamat" class="form-control border border-secondary form-control-lg" name="alamat" required value="{{ old('alamat') }}"></textarea>
                                        <span>
                                            @error('alamat')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="noHp" class="text-secondary">Telepon </label>
                                        <input type="number" id="noHp" class="form-control border border-secondary form-control-lg" name="noHp" required value="{{ old('noHp') }}">
                                        <span>
                                            @error('noHp')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label class="text-secondary">Pilih Target </label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="target" value="naik" id="inlineRadio1">
                                            <label class="form-check-label" for="inlineRadio1">Menaikan Berat Badan</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="target" value="turun" id="inlineRadio2">
                                            <label class="form-check-label" for="inlineRadio2">Menurunkan Berat Badan</label>
                                        </div>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="password" class="text-secondary">Password </label>
                                        <input type="password" id="password" class="form-control border border-secondary form-control-lg" name="password">
                                        <span class="text-danger">
                                            @error('password')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="password_confirmation" class="text-secondary">Konfirmasi Password
                                        </label>
                                        <input type="password" id="password_confirmation" class="form-control border border-secondary form-control-lg" name="password_confirmation" required>
                                        <span class="text-danger">
                                            @error('password_confirmation')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <button type="submit" class="form-control btn btn-primary mt-3">Register</button>
                                </form>
                                <p class="mt-2 text-center">
                                    Sudah Punya Akun?
                                    <a href="{{ route('auth.login') }}" style="text-decoration: none">Ayo Masuk!!</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>