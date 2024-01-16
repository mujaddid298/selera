<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

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
    <title>Login</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="margin-top: 60px">
        <div class="card d-flex align-items-center animate__animated animate__fadeIn rounded" style="width: 90%; max-width: 800px;">
            <div class="card-body p-4">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Login Image" class="login-image img-fluid">
                    </div>
                    <div class="col-lg-6">
                        <div class="spinner-grow text-success" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <h3 class="card-title ">Login</h3>
                        <div class="container ">
                            @if (Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Berhasil!</strong> {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            @if (session('failed'))
                            <div class="alert alert-danger mt-3">
                                {{ session('failed') }}
                            </div>
                            @endif
                        </div>
                        <!-- Tambahkan blok pesan kesalahan di sini -->


                        <form action="{{ route('postLogin') }}" method="POST" class="fade animate__animated animate__fadeIn">
                            @csrf
                            <div class="form-group mt-4">
                                <label class="text-secondary">Email Anda</label>
                                <input type="email" class="form-control border border-secondary form-control-lg" name="email">
                            </div>
                            <div class="form-group mt-1">
                                <label class="text-secondary">Password Anda</label>
                                <input type="password" class="form-control border border-secondary form-control-lg" name="password">
                            </div>
                            <button type="submit" class="form-control btn btn-primary mt-5">Login</button>
                        </form>
                        <p class="mt-2 text-center">Belum punya akun?
                            <a href="{{ route('auth.register') }}" style="text-decoration: none">
                                Ayo buat akun!
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>