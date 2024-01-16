<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <style>
        /* Tambahkan gaya CSS sesuai kebutuhan */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
        }

        h1 {
            color: #343a40;
        }

        .item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .item img {
            width: 80px;
            height: 80px;
            margin-right: 10px;
            border-radius: 4px;
        }

        .item div {
            flex-grow: 1;
        }

        .item h3 {
            color: #343a40;
            margin: 0;
        }

        .item p {
            margin: 5px 0;
            color: #6c757d;
        }

        .checkout-btn {
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .checkout-btn:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>

    <h1>Keranjang Belanja</h1>

    <div class="item">
        <img src="https://via.placeholder.com/80" alt="Makanan 1">
        <div>
            <h3>Nama Makanan 1</h3>
            <p>Harga: $10.00</p>
        </div>
        <input type="checkbox" id="item1" name="item1">
    </div>

    <div class="item">
        <img src="https://via.placeholder.com/80" alt="Makanan 2">
        <div>
            <h3>Nama Makanan 2</h3>
            <p>Harga: $15.00</p>
        </div>
        <input type="checkbox" id="item2" name="item2">
    </div>

    <!-- Tambahkan lebih banyak item jika diperlukan -->

    <button class="checkout-btn" onclick="checkout()">Checkout</button>

    <script>
        function checkout() {
            // Logika checkout dapat ditambahkan di sini
            alert('Anda telah memilih item untuk checkout!');
        }
    </script>

</body>

</html>