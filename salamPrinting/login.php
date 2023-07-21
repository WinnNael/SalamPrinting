<?php

@include 'config.php';

session_start();

$email      = "";
$password   = "";

$sukses    = "";
$error     = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if (isset($_GET['simpan'])) { //untuk create
    $email       = $_GET['email'];
    $password    = md5($_GET['password']);

    if ($email && $password) {
        $select = "select*from user_form where email = '$email' && password = '$password'";
        $cek = mysqli_query($koneksi, $select);

        if (mysqli_num_rows($cek) > 0) {
            $row = mysqli_fetch_array($cek);

            if ($row['user_type'] == 'admin') {
                $_SESSION['admin_name'] = $row['name'];
                $sukses = "selamat datang admin";
                header("refresh:1;url=order_admin.php", true, 301);
            } else if ($row['user_type'] == 'user') {
                $_SESSION['user_name'] = $row['name'];
                $sukses = "selamat datang";
                header("refresh:1;url=entered.php?#produk", true, 301);
            }
        } else {
            $error = "email/password salah";
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
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
                        <h1>-------------</h1>
                    </div>
                    <ul class="menu">
                        <li><a href="index.php">Home</a></li>
                        <!-- <li><a href="index.php?#Quality">Quality</a></li>
                        <li><a href="index.php?#produk">Produk</a></li> -->
                        <!-- <li class="active"><a href="register.php">Daftar</a></li>
                        <li class="active"><a href="login.php">Masuk</a></li>
                        <li class="active"><a href="script_logout.php" onclick="return confirm('Yakin mau logout?')">Keluar</a></li> -->
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
                        <h1>Account Login</h1>
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
                        <form>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo $password ?>">
                            </div>
                            <div class="form-group">
                                </label><a class="form-recovery" href="register.php">Belum punya akun?</a>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="simpan">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script src="login.js"></script>
</body>