<?php

@include 'config.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en" id="home">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Untuk font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Font poppins dari google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="dist/css/style.css">

    <!-- Crisp buat Chat -->
    <script type="text/javascript">
        window.$crisp = [];
        window.CRISP_WEBSITE_ID = "f7adc21c-38eb-46e5-85a2-7dcd378702a8";
        (function() {
            d = document;
            s = d.createElement("script");
            s.src = "https://client.crisp.chat/l.js";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
    </script>

    <title>Salam Printing</title>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="container">
                <div class="box-navbar">
                    <div class="logo">
                        <h1>Salam Printing</h1>
                        <h1>-------------</h1>
                    </div>
                    <ul class="menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php?#Quality">Quality</a></li>
                        <li><a href="index.php?#layanan">Layanan</a></li>
                        <!-- <li class="active"><a href="register.php">Daftar</a></li>
                        <li class="active"><a href="login.php">Masuk</a></li> -->
                        <li class="active"><a href="script_logout.php" onclick="return confirm('Yakin mau keluar?')">Keluar</a></li>
                    </ul>

                    <!-- Pemanggilan dari font awsome -->
                    <i class="fa-solid fa-bars menu-bar"></i>
                </div>
            </div>
        </div>

        <div class="hero">
            <div class="container">
                <div class="box-hero">
                    <div class="box">
                        <h1>
                            Kualitas Cetak Terbaik <br>
                            Memenuhi Kebutuhan Anda
                        </h1>
                        <p>Print Kebutuhan Kamu Sekarang!</p>
                        <form action="login.php">
                            <button>Selengkapnya</button>
                        </form>
                    </div>
                    <div class="box">
                        <img src="assets/img/pngwing.com.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Quality -->
    <div class="Quality" id="Quality">
        <div class="container">
            <div class="box-Quality">
                <div class="box">
                    <i class="fa-solid fa-coins"></i>
                    <h4>Harga Terjangkau</h4>
                    <p>Dapatkan hasil printing berkualitas dengan harga terjangkau, layanan cepat dan jangkauan luas hanya di sini</p>
                </div>
                <div class="box">
                    <i class="fa-solid fa-certificate"></i>
                    <h4>Jaminan Layanan Cepat</h4>
                    <p>Anda tidak perlu khawatir tentang biaya dan waktu. Kami menawarkan harga terjangkau dan jaminan layanan cepat untuk seluruh wilayah Indonesia</p>
                </div>
                <div class="box">
                    <i class="fa-solid fa-people-roof"></i>
                    <h4>Layanan Luas</h4>
                    <p>Jangan ragu untuk memilih percetakan kami. Kami memberikan harga terjangkau, layanan cepat dan luas untuk semua keperluan cetak Anda. Kami siap mewujudkan ide Anda menjadi kenyataan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk -->
    <div class="produk" id="layanan">
        <div class="container">
            <div class="box-produk">
                <div class="box">
                    <img src="assets/img/Poster.png" alt="">
                    <h3>Poster</h3>
                    <p>Buat kesan tak terlupakan dengan poster berkualitas tinggi</p>
                    <a href="detail-poster.php" class="detail-button">Detail</a>
                </div>
                <div class="box">
                    <img src="assets/img/brosur.png" alt="">
                    <h3>Brosur</h3>
                    <p>Sampaikan pesan Anda dengan brosur yang informatif dan menggugah minat</p>
                    <a href="detail-brosur.php" class="detail-button">Detail</a>
                </div>
                <div class="box">
                    <img src="assets/img/stiker.png" alt="">
                    <h3>Sticker</h3>
                    <p>Buat kehidupan Anda lebih berwarna dengan stiker kustom</p>
                    <a href="detail-sticker.php" class="detail-button">Detail</a>
                </div>
                <div class="box">
                    <img src="assets/img/Undangan.png" alt="">
                    <h3>Undangan</h3>
                    <p>Ciptakan momen yang tak terlupakan dengan undangan yang elegan dan berkelas</p>
                    <a href="detail-undangan.php" class="detail-button">Detail</a>
                </div>
                <div class="box">
                    <img src="assets/img/knama.png" alt="">
                    <h3>Kartu Nama</h3>
                    <p>Berikan kesan profesional yang tak terlupakan dengan kartu nama kustom</p>
                    <a href="detail-kartunama.php" class="detail-button">Detail</a>
                </div>
                <div class="box">
                    <img src="assets/img/Polaroid.png" alt="">
                    <h3>Polaroid</h3>
                    <p>Tangkap momen spesial dalam gaya klasik dengan foto polaroid</p>
                    <a href="detail-polaroid.php" class="detail-button">Detail</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar -->
    <div class="daftar" id="daftar">
        <div class="container">
            <div class="box-daftar">
                <h1>Ingin Tau Lebih Lanjut Dengan Kami? <br>Ayok Hubungin Langsung!</h1>
                <h3>Klik link dibawah ini!</h3>
                <!-- <button><i class="fa-brands fa-whatsapp"></i>Whatsapp</button> -->
                <!-- <button><i class="fa-regular fa-envelope"></i>Gmail</button> -->
                <button onclick="window.location.href='https://forms.gle/KD1TwL7zscqNDjnL6'"><i class="fa-regular fa-clipboard"></i>Gform</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="box-footer">
                <div class="box">
                    <h2>Salam Printing.</h2>
                    <p>Jl.Kenangan Utama,No.3</p>
                </div>
                <div class="box">
                    <h3>Menu</h3>
                    <a href="#home">Home</a>
                    <a href="#Quality">Quality</a>
                    <a href="#layanan">Layanan</a>
                    <a href="#daftar">Daftar</a>
                </div>
                <div class="box">
                    <p>&copy; Copyright by <span>Salam Printing</span>
                        All right Reserved 2023, Indonesia</p>
                </div>
            </div>
        </div>
    </div>



    <script src="dist/js/script.js"></script>
</body>

</html>