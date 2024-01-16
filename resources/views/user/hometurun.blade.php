<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Home - Selera Gaya Hidup Sehat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-pY4z12L3lHZClL3XQuXfMOKtjxFaJtzbviN7wqYS4Vv+0os+1k6Lslx+R+dbJgkVsUizfZSMmRa+vO09FbUkQw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Pindahkan skrip jQuery ke bawah Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <link href="/vendor/bootstrap/css/bootstrap.min.css'" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{asset('/vendor/bootstrap/css/bootstrap.min.css')}">
    <!-- Additional CSS Files -->

    <link rel="stylesheet" type="text/css" href="/assets/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/owl.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/master.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/card.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/kalkulator.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!-- Sertakan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        body {
            background-color: #9FD700;
        }

        .sub-header {
            background-color: #9FD700;
        }

        #moreText {
            display: none;
        }

        .card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            margin-bottom: 50px;
            border: 1px solid #ddd;
            overflow: hidden;
            width: 500px;
            max-width: 100%;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-image {
            overflow: hidden;
            padding-top: 12px;
            padding-left: 12px;
            padding-right: 12px;
            align-items: center;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
        }

        .card-image img {
            width: 100%;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover .card-image img {
            padding-top: 12px;
            transform: scale(1.0);
        }

        .card-content {
            padding: 20px;
        }

        .product-title {
            font-size: 1.2em;
            margin-bottom: 10px;
            color: #333333;
        }

        .product-description {
            font-size: 0.9em;
            color: #666666;
            margin-bottom: 15px;
        }

        .price {
            font-size: 1.2em;
            color: #9FD700;
            margin-bottom: 10px;
        }

        .buy-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: black;
            color: #ffffff;
            text-align: center;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease-in-out;
        }

        .row-card {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            /* Jarak antar card */
        }

        .buy-button:hover {
            background-color: #9FD700;
        }

        .circle-icon {
            display: inline-block;
            background-color: black;
            padding: 10px;
            border-radius: 50%;
            transition: background-color 0.3s;
        }

        /* Ikon warna putih */
        .circle-icon i {
            color: white;
        }

        /* Hover effect */
        .circle-icon:hover {
            background-color: #9FD700;
        }

        /* Shopping Cart */
        .shopping-cart {
            position: absolute;
            top: 100%;
            right: -100%;
            height: 100vh;
            width: 35rem;
            padding: 0 1.5rem;
            background-color: #fff;
            color: var(--bg);
            transition: 0.3s;
        }

        .shopping-cart.active {
            right: 0;
        }

        .shopping-cart .cart-item {
            margin: 2rem 0;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px dashed #666;
            position: relative;
        }

        .shopping-cart img {
            height: 6rem;
            border-radius: 50%;
        }

        .shopping-cart h3 {
            font-size: 1.6rem;
            padding-bottom: 0.5rem;
        }

        .shopping-cart .item-price {
            font-size: 1.2rem;
        }

        .shopping-cart .remove-item {
            position: absolute;
            right: 1rem;
            cursor: pointer;
        }

        .shopping-cart .remove-item:hover {
            color: var(--primary);
        }

        .shopping-cart.active {
            /* atur tampilan untuk kelas active di sini */
            right: 0;
        }

        /* CSS untuk Sidebar Keranjang */
        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -500px;
            width: 500px;
            height: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            transition: right 0.3s ease-in-out;
            z-index: 1000;
            /* Atur nilai z-index tinggi agar tampil di paling depan */
        }

        .cart-inner {
            padding: 20px;
        }

        .cart-inner h3 {
            color: #333;
        }

        /* Add this CSS to your existing styles */
        .cart-has-items {
            color: #c0392b;
            /* Change the color to your preference */
            font-weight: bold;
        }

        /* Tambahkan gaya ini ke bagian CSS Anda */
        .cart-item {
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-item img {
            max-width: 60px;
            max-height: 60px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .cart-total {
            margin-top: 20px;
        }

        .cart-buttons {
            margin-top: 20px;
            text-align: center;
        }

        .cart-buttons a,
        .cart-buttons button {
            display: inline-block;
            padding: 10px 20px;
            margin-right: 10px;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
        }

        .cart-buttons a {
            background-color: #27ae60;
        }

        .cart-buttons button {
            background-color: #e74c3c;
        }

        /* Style for Card Container */
        .card-keranjang {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-bottom: 2px solid #ddd;
            /* Tambahkan garis bawah di sini */
        }

        /* Style for Card Image */
        .card-keranjang img {
            max-width: 60px;
            border-radius: 5px;
            margin-right: 10px;
        }

        /* Style for Card Text */
        .card-keranjang h3 {
            margin: 0;
        }

        .card-keranjang p {
            margin: 5px 0;
        }

        /* Style for Quantity Controls and Checkbox */
        .quantity-control,
        .item-checkbox,
        .remove-item {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
            margin-right: px;
        }

        .quantity {
            display: inline-block;
            margin: 0 5px;
        }

        /* Hover effect for buttons */
        .quantity-control:hover,
        .item-checkbox:hover,
        .remove-item:hover {
            background-color: #2980b9;
        }

        /* Additional styling for better visibility */
        .item-checkbox {
            transform: scale(1.2);
        }

        .remove-item {
            background-color: #e74c3c;
        }

        /* Hover effect for remove button */
        .remove-item:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <div id="successMessage" style="display: none;">
        Item berhasil ditambahkan ke keranjang!
    </div>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <ul class="info">
                        <li class="text-white"><i class="fa fa-envelope  text-white"></i> Selera@gmail.com</li>
                        <li class="text-white"><i class="fa fa-map text-white"></i> Politeknik Negeri Bengkalis, FL
                            33160</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <ul class="social-links">
                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="https://x.com/minthu" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">

                        <a href="/" class="logo">
                            <h1>Selera</h1>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="/" class="active">Home</a></li>
                            <li><a href="#paket">Paket Langganan</a></li>
                            <li><a href="{{ route ('user.profile') }}">profil</a></li>
                            <li><a href="#contact">Kontak</a></li>
                            <li><a href="{{route('logout')}}">Logout</a></li>
                            <li>
                                <a href="#keranjang" onclick="openCart()">
                                    <i class="bi bi-cart4"></i>
                                    <span id="cart-item-count" class="cart-item-count">0</span>
                                </a>
                            </li>

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>

                        <!-- ***** Menu End ***** -->


                        <!-- Shopping Cart end -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner">
        <div class="owl-carousel owl-banner">
            <div class="item item-1">
                <div class="header-text">
                    <span class="category">Dapur, <em>Ks</em></span>
                    <h2>hai!<br>Dapatkan kemudahan hidup sehat</h2>
                </div>
            </div>
            <div class="item item-2">
                <div class="header-text">

                    <h2>Hai Kamu!<br>Ayo mulai hidup sehat</h2>
                </div>
            </div>
            <div class="item item-3">
                <div class="header-text">

                    <h2>Mari!<br> Bersama SELERA kita menjalani hidup sehat</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** card ***** -->
    <section class="wrapper">
        <div class="container">
            <div class="row">
                <div id="paket" class="col text-center mt-5 mb-5">
                    <h6 style="color: white;" class="mb-4">| Paket Berlangganan</h6>
                    <h2>Temukan Kemudahan Dalam Melakukan <br> Hidup Sehat Dengan Berlangganan</h2>
                </div>
            </div>
            <div class="row-card">
                @foreach ($paketdata as $index => $paket)
                <div class="card">
                    <div class="card-image">
                        <img src="{{ asset('images/' . $paket->foto) }}" alt="Product Image">
                    </div>
                    <div class="card-content">
                        <div class="product-title"><b>Paket {{ $paket->jenis_paket }} Bulan</b></div>
                        <div class="product-description">{{ $paket->deskripsi }}</div>
                        <div class="price">
                            <h6 style="color: #9FD700;">RP. {{ $paket->harga }}</h6>
                        </div>
                        <div>
                            <a href="{{ route('user.pembayaranpaket', ['id' => $paket->id]) }}" class="buy-button" style="color: #ffffff;">Beli Sekarang</a>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class=" section best-deal">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>| Kalkulator Makanan</h6>
                        <h2>Hitung Berat badan!</h2>
                    </div>
                </div>
                <form id="bmiForm">
                    <label for="weight">Berat (kg): </label>
                    <input type="number" id="weight" step="0.1" required>
                    <br>
                    <label for="height">Tinggi (cm): </label>
                    <input type="number" id="height" step="0.1" required>
                    <br>
                    <button type="button" onclick="calculateBMI()">Hitung BMI</button>
                </form>

                <div id="result"></div>
            </div>
        </div>
    </div>
    <div class="properties section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6 style="color: white;">| Beli Makanan</h6>
                        <h2>Find Your Best Food Now!</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($data as $index => $makanan)
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a href="property-details.html"><img src="{{ asset('images/' . $makanan->foto) }}" alt=""></a>
                        <span class="category">{{ $makanan->jenis_makanan }}</span><br>
                        <h6>Rp.{{$makanan->harga}}</h6>
                        <h4><a href="property-details.html">{{ $makanan->nama_makanan }}</a></h4>
                        <ul>
                            <li>Protein: <span>{{ $makanan->protein }}g</span></li>
                            <li>Kalori: <span>{{ $makanan->kalori }}kkal </span></li>
                            <li>Lemak: <span>{{ $makanan->lemak }}g</span></li>
                            <li>Karbohidrat: <span>{{ $makanan->karbohidrat }}g</span></li>

                        </ul>
                        <div class="main-button">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('user.pembayaran', ['id' => $makanan->id]) }}">Beli Sekarang</a>
                                    <a class="text-white mt-2" onclick="addToCart('{{ $makanan->id }}', '{{ $makanan->nama_makanan }}', '{{ $makanan->harga }}', '{{ asset('images/' . $makanan->foto) }}')"><i class="bi bi-cart4"></i></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="d-flex justify-content-center">
                <a class="btn btn-dark" href="{{ route('user.detailmakanan')}}">Lihat Semua Makanan</a>
            </div>

        </div>
        <!-- Sidebar Keranjang -->
        <div class="cart-sidebar">
            <div class="cart-inner">
                <div class="cart-close">
                    <button onclick="closeCart()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <h3>Keranjang Belanja</h3>
                <ul class="cart-items">
                    <!-- Daftar item keranjang akan ditampilkan di sini -->
                </ul>
                <div class="cart-total">
                    <p>Total Harga: Rp. <span id="cart-total">0</span></p>
                </div>
                <div class="cart-buttons">
                    <a href="javascript:void(0);" onclick="checkout()">Beli Sekarang</a>
                </div>
            </div>
        </div>

        <div class="contact section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4">
                        <div class="section-heading text-center">
                            <h6>| Kontak Kami</h6>
                            <h2>Hubungi Kami</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div id="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d501.1647909712328!2d102.14761192378684!3d1.4563194850773842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d1600706bc73b1%3A0x69bcf3d58ca3e326!2sBengkalis%2C%20Pangkalan%20Batang%2C%20Kec.%20Bengkalis%2C%20Kabupaten%20Bengkalis%2C%20Riau!5e0!3m2!1sid!2sid!4v1701670656863!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="item phone">
                                    <img src="{{asset ('assets/images/phone-icon.png')}}" alt="" style="max-width: 52px;">
                                    <h6>082299758781<br><span>Nomor HP</span></h6>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item email">
                                    <img src="{{asset ('assets/images/email-icon.png')}}" alt="" style="max-width: 52px;">
                                    <h6>selera@gmail.com<br><span>Email Prusahaan</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <form id="contact-form" action="" method="post">
                            <div class="row">
                                <div>
                                    <h6>Contact Us</h6><br>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <label for="name">Nama lengkap</label>
                                        <input type="name" name="name" id="name" placeholder="Nama..." autocomplete="on" required>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <label for="email">Alamat Email</label>
                                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-mail..." required="">
                                    </fieldset>
                                </div>

                                <div class="col-lg-12">
                                    <fieldset>
                                        <label for="message">Pesan</label>
                                        <textarea name="message" id="message" placeholder="Pesan Kamu"></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="orange-button">Kirim</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="container">
                <div class="col-lg-12">
                    <p>Copyright © 2024 Selera.</p>
                </div>
            </div>
        </footer>
        <script>
            function toggleText() {
                var moreText = document.getElementById("moreText");
                var linkText = document.querySelector("a");

                if (moreText.style.display === "none") {
                    moreText.style.display = "block";
                    linkText.innerHTML = "Sembunyikan";
                } else {
                    moreText.style.display = "none";
                    linkText.innerHTML = "Selengkapnya";
                }
            }
        </script>
        <!-- Scripts -->

        <!-- Pindahkan skrip jQuery ke bawah Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset ('/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset ('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset ('/assets/js/isotope.min.js') }}"></script>
        <script src="{{ asset ('/assets/js/owl-carousel.js') }}"></script>
        <script src="{{ asset ('/assets/js/counter.js') }}"></script>
        <script src="{{ asset ('/assets/js/custom.js') }}"></script>

        <script>
            function calculateBMI() {
                // Ambil nilai berat dan tinggi dari input form
                var weight = parseFloat(document.getElementById('weight').value);
                var height = parseFloat(document.getElementById('height').value);
                var gender = "{{ auth()->user()->jenis_kelamin }}"; // Mendapatkan jenis kelamin dari pengguna yang login

                // Validasi input
                if (isNaN(weight) || isNaN(height) || weight <= 0 || height <= 0) {
                    alert('Masukkan berat dan tinggi yang valid.');
                    return;
                }

                // Hitung BMI
                var bmi;

                // Kalkulator BMI khusus perempuan
                if (gender === 'perempuan') {
                    bmi = weight / Math.pow(height / 100, 2);
                }
                // Kalkulator BMI khusus laki-laki
                else {
                    bmi = weight / Math.pow(height / 100, 2);
                }

                // Tampilkan hasil
                var resultElement = document.getElementById('result');
                resultElement.innerHTML = 'BMI Anda: ' + bmi.toFixed(2);

                // Tentukan kategori BMI
                if (gender === 'perempuan') {
                    if (bmi < 18.5) {
                        resultElement.innerHTML += ' (Berat Badan Kurang) - Yuk, pertahankan pola makan sehat!';
                    } else if (bmi < 24.9) {
                        resultElement.innerHTML += ' (Berat Badan Normal) - Selamat, terus jaga pola hidup sehat!';
                    } else if (bmi < 29.9) {
                        resultElement.innerHTML += ' (Berat Badan Berlebih) - Ayo, pertimbangkan pola makan yang lebih seimbang!';
                    } else {
                        resultElement.innerHTML += ' (Obesitas) - Saatnya mulai kebiasaan hidup sehat!';
                    }
                } else {
                    // Kategori BMI untuk laki-laki
                    if (bmi < 18.5) {
                        resultElement.innerHTML += ' (Berat Badan Kurang) - Yuk, pertahankan pola makan sehat!';
                    } else if (bmi < 24.9) {
                        resultElement.innerHTML += ' (Berat Badan Normal) - Selamat, terus jaga pola hidup sehat!';
                    } else if (bmi < 29.9) {
                        resultElement.innerHTML += ' (Berat Badan Berlebih) - Ayo, pertimbangkan pola makan yang lebih seimbang!';
                    } else {
                        resultElement.innerHTML += ' (Obesitas) - Saatnya mulai kebiasaan hidup sehat!';
                    }
                }

            }

            function openCart() {
                document.querySelector('.cart-sidebar').style.right = '0';
            }

            function closeCart() {
                document.querySelector('.cart-sidebar').style.right = '-500px';
            }

            // Event listener for the "Show Cart" button
            document.querySelector('.show-cart').addEventListener('click', openCart);

            function addToCart(id, nama, harga, imageSrc) {
                const cartItems = document.querySelector('.cart-items');
                const cartTotal = document.querySelector('#cart-total');
                const cartItemCount = document.getElementById('cart-item-count');

                // Check if the item with the same ID is already in the cart
                const existingItem = document.querySelector(`.item[data-id="${id}"]`);

                // Get the cart icon
                const cartIcon = document.querySelector('.bi-cart4');

                if (existingItem) {
                    // If the item already exists, update the quantity instead of adding a new item
                    increaseQuantity(id, harga);
                } else {
                    // Create a new item div
                    const newItem = document.createElement('div');
                    newItem.classList.add('item');
                    newItem.setAttribute('data-id', id);
                    newItem.innerHTML = `
        <div class="shadow p-3">
            <div class="card-keranjang">
                <img src="${imageSrc}" style="width: 60px" alt="${nama}">
                <p>${nama}</p>
                <p>Harga: Rp.${harga}</p>
            </div>
            <div>
            <div class="row">
            <div class="col">
            <P>Pilih makanan</P>
            <input type="checkbox" class="item-checkbox" data-price="${harga}" onchange="updateTotal()">
            </div>
            <div class="col">
            </div>
            </div>
                <button class="quantity-control" onclick="decreaseQuantity('${id}', ${harga})">-</button>
                <span class="quantity">1</span>
                <button class="quantity-control" onclick="increaseQuantity('${id}', ${harga})">+</button>
                <button class="remove-item" onclick="removeItem('${id}', ${harga})">Hapus</button>
            </div>
        </div>
    `;

                    // Add the item to the cart
                    cartItems.appendChild(newItem);

                    // Update the total price
                    updateTotal();

                    // Update the cart item count
                    updateCartItemCount();

                    // Highlight or change the color of the cart icon to indicate that items are in the cart
                    cartIcon.classList.add('cart-has-items');


                }
            }

            function increaseQuantity(id, harga) {
                const itemToIncrease = document.querySelector(`.item[data-id="${id}"]`);
                const quantityElement = itemToIncrease.querySelector('.quantity');
                let quantity = parseInt(quantityElement.textContent) || 1;
                quantity++;
                quantityElement.textContent = quantity;
            }

            function decreaseQuantity(id, harga) {
                const itemToDecrease = document.querySelector(`.item[data-id="${id}"]`);
                const quantityElement = itemToDecrease.querySelector('.quantity');
                let quantity = parseInt(quantityElement.textContent) || 1;

                if (quantity > 1) {
                    quantity--;
                    quantityElement.textContent = quantity;
                }
            }

            function updateTotal() {
                // Get all items in the cart with checkboxes checked
                const checkedItems = document.querySelectorAll('.item .item-checkbox:checked');

                // Calculate the total price based on checked items
                let total = 0;

                checkedItems.forEach(function(checkbox) {
                    const item = checkbox.closest('.item');
                    const itemPrice = parseFloat(checkbox.getAttribute('data-price'));
                    const quantity = parseInt(item.dataset.quantity) || 1; // Mengambil quantity dari data-quantity

                    total += itemPrice * quantity;
                });

                // Update the total price on the view
                document.getElementById("cart-total").innerText = total.toFixed(2);
            }

            // Event listener for checkboxes
            document.querySelectorAll('.item-checkbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    updateTotal();
                });
            });


            function removeItem(id, harga) {
                const itemToRemove = document.querySelector(`.item[data-id="${id}"]`);
                const quantity = parseInt(itemToRemove.querySelector('.quantity').textContent) || 1;
                const totalToRemove = parseFloat(harga) * quantity;

                // Hapus item dari keranjang
                itemToRemove.remove();

                // Perbarui total harga
                updateTotal();

                // Perbarui jumlah item di keranjang
                updateCartItemCount();

                // Jika semua item dihapus, atur total harga menjadi nol
                if (cartItemCount.textContent === '0') {
                    document.getElementById("cart-total").innerText = '0.00';

                    // Hapus indikator bahwa ada item di keranjang
                    cartIcon.classList.remove('cart-has-items');
                }

                // Tambahkan peringatan untuk alergi (sesuaikan ini berdasarkan kebutuhan Anda)
                alert('Peringatan: Item ini mungkin mengandung alergen. Harap tinjau sebelum membeli.');
            }
        </script>
        <script>
            function checkout() {
                const cartItems = document.querySelectorAll('.cart-items .item');

                if (cartItems.length > 0) {
                    // Create an array to store the selected items
                    const selectedItems = [];

                    // Loop through each item in the cart
                    cartItems.forEach(function(item) {
                        const itemId = item.getAttribute('data-id');
                        const itemName = item.querySelector('p').textContent;
                        const itemPrice = parseFloat(item.querySelector('.quantity').textContent) * parseFloat(item.querySelector('.item-checkbox').getAttribute('data-price'));
                        const itemImage = item.querySelector('img').getAttribute('src');
                        const itemQuantity = parseInt(item.querySelector('.quantity').textContent) || 1;

                        selectedItems.push({
                            id: itemId,
                            name: itemName,
                            price: itemPrice.toFixed(2),
                            image: itemImage,
                            quantity: itemQuantity,
                        });
                    });

                    const selectedItemsJson = encodeURIComponent(JSON.stringify(selectedItems));

                    window.location.href = `/user/pembayarankeranjang?items=${selectedItemsJson}`;
                } else {
                    alert('Keranjang belanja kosong. Tambahkan item terlebih dahulu.');
                }
            }
        </script>
        <script>
            function updateQuantity(itemId, quantity) {
                const itemElement = document.getElementById(`item-${itemId}`);
                const totalHargaElement = itemElement.querySelector('.total-harga');

                // Update quantity and total price
                totalHargaElement.textContent = `Total Harga: Rp.${(itemElement.dataset.harga * quantity).toFixed(2)}`;
                // Update total price keseluruhan
                updateTotal();
            }

            function updateCartItemCount() {
                const cartItemCount = document.getElementById('cart-item-count');
                const itemCount = document.querySelectorAll('.item').length;
                cartItemCount.textContent = itemCount;
            }
        </script>

</body>

</html>