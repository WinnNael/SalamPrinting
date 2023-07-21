<?php

@include 'config.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail - Salam Printing</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap">
    <link rel="stylesheet" href="dist/css/style2.css">
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
                        <li><a href="index.php?#produk">Produk</a></li>
                        <!-- <li class="active"><a href="register.php">Daftar</a></li>
                            <li class="active"><a href="login.php">Masuk</a></li>
                            <li class="active"><a href="script_logout.php" onclick="return confirm('Yakin mau logout?')">Keluar</a></li> -->
                    </ul>

                    <i class="fa-solid fa-bars menu-bar"></i>
                </div>
            </div>
        </div>
    </header>

    <section class="detail-product">
        <div class="container">
            <div class="product-info">
                <img src="assets/img/Poster.png" alt="Poster">
                <h2>Poster</h2>
                <p>Buat kesan tak terlupakan dengan poster berkualitas tinggi</p>
                <h3>Keunggulan Produk:</h3>
                <ul>
                    <li>Kualitas cetakan yang tajam dan jelas</li>
                    <li>Tersedia dalam berbagai ukuran dan jenis kertas</li>
                    <li>Pilihan desain kustom sesuai dengan kebutuhan Anda</li>
                    <li>Pengiriman cepat dan aman</li>
                    <li>Harga terjangkau</li>
                    <a href="order_customer.php" class="order-button">Pesan</a>



                </ul>
                <h3>Harga:</h3>
                <p>Rp 50.000 - Rp 200.000 </p>
                <a href="index.php"> Kembali ke Daftar Produk</a>
            </div>
        </div>
    </section>

    <footer>
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
                        <a href="#produk">Produk</a>
                        <a href="#daftar">Daftar</a>
                    </div>
                    <div class="box">
                        <p>&copy; Copyright by <span>Salam Printing</span>
                            All right Reserved 2023, Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <script src="dist/js/script.js"></script>
</body>

</html>