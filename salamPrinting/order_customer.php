<?php

@include 'config.php';
@include 'upload_file.php';

session_start();

if(!isset($_SESSION['user_name'])){
    header('location:login.php');
}

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
    <link rel="stylesheet" href="dist/css/login.css">
    <script src="login.js"></script>

    <title>Salam Printing</title>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="container">
                <div class="box-navbar">
                    <div class="logo">
                        <h1>Salam Printing</h1>
                        <h1><span><?php echo $_SESSION['user_name'] ?></span></h1>
                    </div>
                        <ul class="menu">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="index.php?#Quality">Quality</a></li>
                            <li><a href="index.php?#produk">Produk</a></li>
                            <li class="active"><a href="register.php">Daftar</a></li>
                            <li class="active"><a href="login.php">Masuk</a></li>
                            <li class="active"><a href="script_logout.php" onclick="return confirm('Yakin mau logout?')">Keluar</a></li>
                        </ul>

                        <!-- Pemanggilan dari font awsome -->
                        <i class="fa-solid fa-bars menu-bar"></i>
                </div>
            </div>
        </div>

        <div class="hero">
            <!-- Form-->
            <div class="form">
                <div class="form-toggle"></div>
                    <div class="form-panel one">
                        <div class="form-header">
                            <h1>Order Produk</h1>
                        </div>
                <div class="form-content">
                    <?php
                    if ($error) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error ?>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if ($sukses) {
                    ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $sukses ?>
                        </div>
                    <?php
                    }
                    ?>
                    <form action="" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <label for="produk">Produk</label>
                        <div>
                            <select class="form-control" name="produk">
                                <option value="">- Pilih Produk -</option>
                                <option value="Poster" <?php if ($produk == "Poster") echo "selected" ?>>Poster</option>
                                <option value="Brosur" <?php if ($produk == "Brosur") echo "selected" ?>>Brosur</option>
                                <option value="Sticker" <?php if ($produk == "Sticker") echo "selected" ?>>Sticker</option>
                                <option value="Undangan" <?php if ($produk == "Undangan") echo "selected" ?>>Undangan</option>
                                <option value="Kartu Nama" <?php if ($produk == "Kartu Nama") echo "selected" ?>>Kartu Nama</option>
                                <option value="Polaroid" <?php if ($produk == "Polaroid") echo "selected" ?>>Polaroid</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Nama</label>
                        <input type="text" class="form-control" id_transaksi="nama" name="nama" value="<?php echo $nama ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Nomor Hp</label>
                        <input type="text" class="form-control" id_transaksi="no_hp" name="no_hp" value="<?php echo $no_hp ?>">
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Alamat Pengiriman</label>
                        <input type="text" class="form-control" id_transaksi="alamat" name="alamat" value="<?php echo $alamat ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">File</label>
                        <input type="file" class="form-control" id_transaksi="file" name="file">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" name="simpan">Pesan sekarang</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </header>
</body>