<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Home - Selera Gaya Hidup Sehat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css'" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{asset('/vendor/bootstrap/css/bootstrap.min.css')}">
    <!-- Additional CSS Files -->

    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.css">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/master.css">
    <link rel="stylesheet" type="text/css" href="assets/css/card.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/kalkulator.css">

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
    </style>
</head>

<body>

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
                            <li><a href="#" class="active">Home</a></li>
                            <li><a href="#tentang">Tentang</a></li>
                            <li><a href="#contact">Kontak</a></li>
                            <li><a href="{{route('auth.login')}}">Login</a></li>
                            <li><a class="" href="{{route('auth.register')}}">Daftar</a></li>
                            <li><a href="#"><i class="bi bi-cart4"></i></a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>

                        <!-- ***** Menu End ***** -->
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
                <div class="col text-center mt-5 mb-5">
                    <h6 style="color: white;" class="mb-4">| Paket Berlangganan</h6>
                    <h2>Temukan Kemudahan Dalam Melakukan <br> Hidup Sehat Dengan Berlangganan</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                    <div class="card text-dark card-has-bg click-col" style="background-image:url('https://source.unsplash.com/600x900/?tech,street');">
                        <img class="card-img d-none" src="https://source.unsplash.com/600x900/?tech,street" alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?">
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="card-body">
                                <small class="card-meta mb-2">Peket Berlangganan</small>
                                <h4 class="card-title mt-0 "><a class="text-dark" herf="https://creativemanner.com">1
                                        Bulan</a></h4>
                                <small><i class="far fa-clock"></i> </small>
                            </div>
                            <div class="card-footer">
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="my-0 text-dark d-block">Rp.2.000.000</h6>
                                        <small></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                    <div class="card text-dark card-has-bg click-col" style="background-image:url('https://source.unsplash.com/600x900/?tech,street');">
                        <img class="card-img d-none" src="https://source.unsplash.com/600x900/?tech,street" alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?">
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="card-body">
                                <small class="card-meta mb-2">Peket Berlangganan</small>
                                <h4 class="card-title mt-0 "><a class="text-dark" herf="https://creativemanner.com">2
                                        Bulan</a></h4>
                                <small><i class="far fa-clock"></i> </small>
                            </div>
                            <div class="card-footer">
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="my-0 text-dark d-block">Rp.4.000.000</h6>
                                        <small></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                    <div class="card text-dark card-has-bg click-col" style="background-image:url('https://source.unsplash.com/600x900/?tech,street');">
                        <img class="card-img d-none" src="https://source.unsplash.com/600x900/?tech,street" alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?">
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="card-body">
                                <small class="card-meta mb-2">Peket Berlangganan</small>
                                <h4 class="card-title mt-0 "><a class="text-dark" herf="https://creativemanner.com">3
                                        Bulan</a></h4>
                                <small><i class="far fa-clock"></i> </small>
                            </div>
                            <div class="card-footer">
                                <div class="media">
                                    <div class="media-body">
                                        <h6 class="my-0 text-dark d-block">Rp.6.000.000</h6>
                                        <small></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <div class="section best-deal">
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

    <div class="video section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6>| Video produk</h6>
                        <h2>Mengedukasi untuk menerapkan gaya hidup sehat</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="video-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="video-frame">
                        <img src="assets/images/video-frame.jpg" alt="">
                        <a href="https://youtube.com" target="_blank"><i class="fa fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section best-deal" id="tentang">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>| Rekomendasi Makanan</h6>
                        <h2>Find Your Best Food Now!</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="tabs-content">
                        <div class="row">
                            <div class="nav-wrapper ">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link " id="appartment-tab" data-bs-toggle="tab" data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment" aria-selected="true">Rekomendasi Menurunkan Berat
                                            Badan</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button" role="tab" aria-controls="villa" aria-selected="false">Rekomendasi Menaikkan Berat Badan</button>
                                    </li>

                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-table">
                                                <ul>
                                                    <li>Protein<span>31 g</span></li>
                                                    <li>kalori<span>165g</span></li>
                                                    <li>lemak<span>3.6g</span></li>
                                                    <li>karbohidrat<span>0.9g</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="{{ asset ('assets/images/itayam.jpg') }}" alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Ayam panggang dan sayur</h4>
                                            <p>Ayam Panggang dengan Sayuran adalah hidangan lezat yang tidak hanya
                                                memanjakan lidah tetapi juga memberikan manfaat
                                                kesehatan yang tinggi. Dalam hidangan ini, dada ayam tanpa kulit yang
                                                beratnya sekitar 100 gram dipanggang dengan
                                                sempurna, menciptakan lapisan luar yang renyah dan rasa yang lezat di
                                                setiap gigitannya. <br><br>
                                                Dada ayam ini bukan hanya sumber protein yang kaya dengan kandungan
                                                sekitar 31 gram per porsi, tetapi juga rendah lemak,
                                                menyajikan sekitar 3.6 gram lemak. Selain itu, kandungan karbohidratnya
                                                yang sekitar 0.9 gram menjadikannya pilihan
                                                makanan rendah karbohidrat yang ideal.
                                            </p>
                                            <p id="moreText">
                                                Ditambah lagi dengan porsi sayuran panggang yang mendampingi, seperti
                                                wortel yang manis, brokoli yang kaya serat, dan
                                                kembang kol yang lembut, membuat hidangan ini semakin kaya akan nutrisi.
                                                Sayuran ini menyediakan sekitar 2 gram protein,
                                                0.5 gram lemak, dan 10 gram karbohidrat, menjadikannya sumber serat yang
                                                baik.
                                            </p>
                                            <p>
                                                <a href="javascript:void(0);" onclick="toggleText()">Selengkapnya</a>
                                            </p>
                                            <div class="icon-button">
                                                <a href="property-details.html"><i class="bi bi-cart4"></i>
                                                    Keranjang</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-table">
                                                <ul>
                                                    <li>Protein<span>8g</span></li>
                                                    <li>kalori<span>222g</span></li>
                                                    <li>lemak<span>3.6g</span></li>
                                                    <li>karbohidrat<span>39g</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="{{ asset ('assets/images/itsalad.jpg') }}" alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Quinoa Salad</h4>
                                            <p>Quinoa Salad adalah hidangan yang lezat dan nutrisi tinggi yang
                                                menyajikan kombinasi seimbang antara quinoa matang,
                                                sayuran segar, dan dressing minyak zaitun. Dengan nutrisi yang kaya,
                                                hidangan ini menjadi pilihan yang baik untuk
                                                memenuhi kebutuhan gizi harian Anda.
                                            <div class="icon-button">
                                                <a href="property-details.html"><i class="bi bi-cart4"></i>
                                                    Keranjang</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="properties section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6 style="color: white;">| Beli Makanan</h6>
                        <h2>We Provide The Best Property You Like</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a href="property-details.html"><img src="assets/images/makanan1.png" alt=""></a>
                        <span class="category">Promo</span>
                        <h6>Rp.23.000</h6>
                        <h4><a href="property-details.html">Ayam dan Sayur</a></h4>
                        <ul>
                            <li>Protein: <span>8 g</span></li>
                            <li>kalori: <span>8 g</span></li>
                            <li>lemak: <span>545 g</span></li>
                            <li>karbohidrat: <span>50 g</span></li>

                        </ul>
                        <div class="main-button">
                            <a href="{{ route ('auth.login')}}">Masuk Keranjang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a href="property-details.html"><img src="assets/images/makanan1.png" alt=""></a>
                        <span class="category">Promo</span>
                        <h6>Rp.23.000</h6>
                        <h4><a href="property-details.html">Ayam dan Sayur</a></h4>
                        <ul>
                            <li>Protein: <span>8 g</span></li>
                            <li>kalori: <span>8 g</span></li>
                            <li>lemak: <span>545 g</span></li>
                            <li>karbohidrat: <span>50 g</span></li>

                        </ul>
                        <div class="main-button">
                            <a href="">Masuk Keranjang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <a href="property-details.html"><img src="assets/images/makanan1.png" alt=""></a>
                        <span class="category">Promo</span>
                        <h6>Rp.23.000</h6>
                        <h4><a href="property-details.html">Ayam dan Sayur</a></h4>
                        <ul>
                            <li>Protein: <span>8 g</span></li>
                            <li>kalori: <span>8 g</span></li>
                            <li>lemak: <span>545 g</span></li>
                            <li>karbohidrat: <span>50 g</span></li>

                        </ul>
                        <div class="main-button">
                            <a href="{{ route ('auth.login')}}">Masuk Keranjang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact section" id="contact">
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
                                <img src="assets/images/phone-icon.png" alt="" style="max-width: 52px;">
                                <h6>082299758781<br><span>Nomor HP</span></h6>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="item email">
                                <img src="assets/images/email-icon.png" alt="" style="max-width: 52px;">
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

            // Validasi input
            if (isNaN(weight) || isNaN(height) || weight <= 0 || height <= 0) {
                alert('Masukkan berat dan tinggi yang valid.');
                return;
            }

            // Hitung BMI
            var bmi = weight / Math.pow(height / 100, 2);

            // Tampilkan hasil
            var resultElement = document.getElementById('result');
            resultElement.innerHTML = 'BMI Anda: ' + bmi.toFixed(2);

            // Tentukan kategori BMI
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
    </script>

</body>

</html>