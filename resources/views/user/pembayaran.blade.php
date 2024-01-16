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
            background-color: #007bff;
            color: #fff;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .order-form button:hover {
            background-color: #0056b3;
        }

        img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .upload-section {
            display: none;
        }

        .order-form button {
            background-color: black;
            color: #fff;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
            /* Mengubah button menjadi elemen blok */
            margin: 0 auto;
            /* Menempatkan button di tengah */
        }

        .order-form button:hover {
            background-color: #9FD700;
            /* Warna hover yang diinginkan */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="order-container">
            <div class="order-form">
                <h2>Buat Pesanan</h2>

                <form action="{{ route ('storePemesanan')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Pastikan ada nilai $data sebelum mencoba mengakses propertinya -->
                    @if(isset($data['makanan']) && isset($data['user']))
                    <!-- Informasi makanan -->
                    <div class="text-center">
                        <img src="{{ asset('images/' . $data['makanan']['foto']) }}" alt="Foto Makanan" class="img-fluid">
                        <h4>{{ $data['makanan']['nama_makanan'] }}</h4>
                        <p>Harga: Rp.{{ $data['makanan']['harga'] }}</p>
                    </div>

                    <!-- Informasi pengguna -->
                    <input type="hidden" name="id[]" value="{{ $data['makanan']['id'] }}">
                    <div class="mb-3">
                        <label for="name">Nama :</label>
                        <h6 class="">{{ $data['user']['name'] }}</h6>
                        <label for="alamat ">Alamat :</label>
                        <h6 class="">{{ $data['user']['alamat'] }}</h6>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" id="name" name="name" value="{{ $data['user']['name'] }}" class="form-control" required readonly>
                        <input type="hidden" id="alamat" name="alamat" value="{{ $data['user']['alamat'] }}" class="form-control" required readonly>
                    </div>

                    <!-- Metode Pembayaran -->
                    <div class="mb-3">
                        <label for="metode_pembayaran" class="form-label">Metode Pembayaran:</label>
                        <select id="metode_pembayaran" name="metode_pembayaran" class="form-select" required onchange="toggleUploadSection()">
                            <option value="" disabled selected>Pilih Metode Pembayaran</option>
                            <option value="cod">COD (Cash on Delivery)</option>
                            <option value="transfer_bank">Transfer Bank</option>
                        </select>
                    </div>

                    <!-- Upload Section -->
                    <div id="uploadSection" class="upload-section">
                        <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran:</label>
                        <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="form-control" accept="image/*" disabled>
                        <label for="bukti_pembayaran" class="form-label">Nomor Rekening : 123456789</label>
                        <label for="bukti_pembayaran" class="form-label">Atas Nama : GUNAWAN</label>
                    </div>

                    <!-- Tombol Buat Pesanan -->
                    <div class="order-actions">
                        <button type="submit" class="btn btn-dark">Buat Pesanan</button>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleUploadSection() {
            var uploadSection = document.getElementById('uploadSection');
            var selectedPaymentMethod = document.getElementById('metode_pembayaran').value;
            var buktiPembayaranInput = document.getElementById('bukti_pembayaran');

            if (selectedPaymentMethod === 'transfer_bank') {
                uploadSection.style.display = 'block';
                buktiPembayaranInput.removeAttribute('disabled');
            } else {
                uploadSection.style.display = 'none';
                buktiPembayaranInput.setAttribute('disabled', 'disabled');
            }
        }
    </script>

</body>

</html>