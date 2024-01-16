<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Buat Pesanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f2f4f8;
            margin: 0;
            padding: 0;
        }

        .order-container {
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }

        .order-form h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        .order-form label {
            margin-bottom: 0.5rem;
            display: block;
        }

        .order-form input,
        .order-form textarea,
        .order-form select {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            background-color: #f8f9fa;
            color: #495057;
        }

        .order-form button {
            background-color: black;
            color: #fff;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .order-form button:hover {
            background-color: #9FD700;
        }

        img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .upload-section {
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="order-container">
            <div class="order-form">
                <h2 style="color: black;">Buat Pesanan</h2>

                <!-- Form Section -->
                <form action="{{ route('storePemesananPaket') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Informasi makanan -->
                    <div class="text-center">
                        <img src="{{ asset('images/' . $data['paket']['foto']) }}" alt="Foto Paket" class="img-fluid">
                        <h4>Paket {{ $data['paket']['jenis_paket'] }} Bulan</h4>
                        <p>Harga: Rp.{{ $data['paket']['harga'] }}</p>
                    </div>

                    <!-- Informasi pengguna -->
                    <input type="hidden" name="id" value="{{ $data['paket']['id'] }}">
                    <div class="mb-3">
                        <label for="name">Nama :</label>
                        <h6 class="">{{ $data['user']['name'] }}</h6>
                        <label for="alamat ">Alamat :</label>
                        <h6 class="">{{ $data['user']['alamat'] }}</h6>
                        <label for="alamat ">Nomor HP :</label>
                        <h6 class="">{{ $data['user']['no_hp'] }}</h6>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" id="name" name="name" value="{{ $data['user']['name'] }}" class="form-control" required readonly>
                        <input type="hidden" id="alamat" name="alamat" value="{{ $data['user']['alamat'] }}" class="form-control" required readonly>
                        <input type="hidden" id="no_hp" name="no_hp" value="{{ $data['user']['no_hp'] }}" class="form-control" required readonly>
                    </div>

                    <!-- Upload bukti pembayaran -->
                    <div class="upload-section">
                        <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran:</label>
                        <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="form-control" accept="image/*">
                        <small class="form-text text-muted">Nomor Rekening: 123456789 | Atas Nama: GUNAWAN</small>
                    </div>

                    <center><button type="submit" class="btn btn-dark">Simpan Pembayaran</button></center>
                </form>
                <!-- End of Form Section -->

            </div>
        </div>
    </div>
</body>

</html>