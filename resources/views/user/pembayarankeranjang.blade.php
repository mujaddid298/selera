<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Pembayaran - Selera Gaya Hidup Sehat</title>
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

                <ul class="list-group">
                    <?php
                    $grandTotal = 0; // Inisialisasi variabel untuk total harga keseluruhan

                    foreach ($selectedItems as $item) {
                        // URL gambar yang asli
                        $originalImageUrl = $item['image'];

                        // Bagian dari URL yang ingin dihilangkan
                        $removePart = "http://127.0.0.1:8000/images/";

                        // Menghilangkan bagian yang tidak diinginkan dari URL
                        $cleanImageUrl = str_replace($removePart, "", $originalImageUrl);

                        $totalHarga = $item['price'] * ($item['quantity'] ?? 1);
                        $grandTotal += $totalHarga; // Tambahkan total harga item ke total keseluruhan
                    ?>
                        <li class="list-group-item" id="item-{{ $item['id'] }}" data-harga="{{ $item['price'] }}" data-quantity="{{ $item['quantity'] ?? 1 }}">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ asset('images/' . $cleanImageUrl) }}" alt="{{ $item['name'] }}" style="width: 100%;">
                                </div>
                                <div class="col-md-9">
                                    <strong>{{ $item['name'] }}</strong>
                                    <br>
                                    Harga: Rp.{{ $item['price'] }}
                                    <br>
                                    Jumlah Pesanan:
                                    <input type="number" class="form-control" value="{{ $item['quantity'] ?? 1 }}" min="1" onchange="updateQuantity('{{ $item['id'] }}', this.value)">
                                    <br>
                                    <span class="total-harga" style="display: none;">Rp.{{ number_format($totalHarga, 2) }}</span>
                                </div>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <p class="mt-3">Total Harga: Rp.<span id="grand-total">{{ number_format($grandTotal, 2) }}</span></p>


                <form action="{{ route ('storePemesanan')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <!-- Informasi pengguna -->
                    <div id="itemsContainer">
                        @foreach($selectedItems as $item)
                        <input type="hidden" name="id[]" value="{{ $item['id'] }}">
                        @endforeach
                    </div>
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="mb-3">
                        <label for="name">Nama :</label>
                        <h6 class="">{{ $user->name }}</h6>
                        <input type="hidden" id="name" name="name" value="{{ $user->name }}" class="form-control" required readonly>
                        <label for="alamat ">Alamat :</label>
                        <h6 class="">{{ $user->alamat }}</h6>
                        <input type="hidden" id="alamat" name="alamat" value="{{ $user->alamat }}" class="form-control" required readonly>
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

                    <div id="uploadSection" class="upload-section">
                        <!-- Your existing upload section -->
                    </div>


                    <button type="submit" class="btn btn-primary">Pesan Sekarang</button>

                </form>
            </div>
        </div>

    </div>


    <script>
        function addFoodItem() {
            var itemsContainer = document.getElementById('itemsContainer');
            var newItem = document.createElement('div');
            newItem.className = 'item';

            // Define your input fields for the new item
            var newIndex = itemsContainer.getElementsByClassName('item').length;
            newItem.innerHTML = `
            <input type="hidden" name="items[${newIndex}][id]" value="">
            <input type="hidden" name="items[${newIndex}][quantity]" value="1">
            <input type="hidden" name="items[${newIndex}][price]" value="">
            <!-- Add other item fields as needed -->
        `;

            itemsContainer.appendChild(newItem);
        }

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

        function updateQuantity(itemId, quantity) {
            const itemElement = document.getElementById(`item-${itemId}`);
            const totalHargaElement = itemElement.querySelector('.total-harga');

            // Update quantity and total price
            itemElement.dataset.quantity = quantity;
            totalHargaElement.textContent = `Total Harga: Rp.${(itemElement.dataset.harga * quantity).toFixed(2)}`;

            // Update total price keseluruhan
            updateTotal();
        }

        function updateTotal() {
            // Get all items in the list
            const items = document.querySelectorAll('ul li');

            // Calculate the total price based on each item's quantity and price
            let grandTotal = 0;

            items.forEach(function(item) {
                const price = parseFloat(item.dataset.harga);
                const quantity = parseInt(item.dataset.quantity) || 1;

                grandTotal += price * quantity;
            });

            // Update the total price on the view
            document.getElementById("grand-total").innerText = grandTotal.toFixed(2);
        }
    </script>
</body>

</html>