<?php

@include 'config.php';

session_start();

$name       = "";
$email      = "";
$password   = "";
$cpassword  = "";
$user_type  = "";

$sukses    = "";
$error     = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if (isset($_POST['simpan'])) { //untuk create
    $name        = $_POST['name'];
    $email       = $_POST['email'];
    $password    = md5($_POST['password']);
    $cpassword   = md5($_POST['cpassword']);
    $user_type   = "user";

    if ($name && $email && $password && $cpassword && $user_type) {
        if ($password != $cpassword) {
            $error     = "password tidak sama";
        } else {
            $select = "select*from user_form where email = '$email' && password = '$password'";
            $cek = mysqli_query($koneksi, $select);
            if (mysqli_num_rows($cek) > 0) {
                $error     = "User sudah ada";
            } else {
                if ($op == 'edit') { //untuk update
                    $id     = $_GET['id'];
                    $sql1   = "update user_form set name = '$name', email = '$email', password = '$password', user type = '$user_type' where id = '$id'";
                    $q1     = mysqli_query($koneksi, $sql1);
                    if ($q1) {
                        $sukses = "Data berhasil diupdate";
                        header("refresh:5;url=login.php", true, 301);
                    } else {
                        $error  = "Data gagal diupdate";
                    }
                } else {
                    $sql1   = "insert into user_form(name,email,password,user_type) values ('$name','$email','$password','$user_type')";
                    $q1     = mysqli_query($koneksi, $sql1);
                    if ($q1) {
                        $sukses     = "Berhasil membuat akun baru";
                        header("refresh:1;url=login.php", true, 301);
                    } else {
                        $error      = "Gagal membuat akun";
                    }
                }
            }
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
                            <li><a href="index.php?#produk">Produk</a></li>
                            <li class="active"><a href="register.php">Daftar</a></li>
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
                <div class="form-panel one">
                    <div class="form-header">
                        <h1>Register Account</h1>
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
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password" value="<?php echo $password ?>">
                            </div>
                            <div class="form-group">
                                <label for="cpassword">Confirm Password</label>
                                <input type="text" class="form-control" id="cpassword" name="cpassword" value="<?php echo $cpassword ?>">
                            </div>
                            <div class="form-group">
                                </label><a class="form-recovery" href="login.php">Sudah punya akun?</a>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="simpan">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>