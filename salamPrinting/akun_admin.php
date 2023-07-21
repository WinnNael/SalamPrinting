<?php

@include 'config.php';
@include 'script_akun.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:login.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Salam Printing</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="order_admin.php">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="akun_admin.php">Akun User</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="produk_admin.php">Produk</a>
                    </li> -->
                    <li>
                        <a href="script_logout.php" onclick="return confirm('Yakin mau logout?')"><button type="button" class="btn btn-danger">Logout</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>halo admin <span><?php echo $_SESSION['admin_name'] ?></span></h1>
        <div class="row">
            <div class="col-md-5 col-sm-6">
                <!-- untuk memasukkan data -->
                <div class="card">
                    <div class="card-header">
                        Create / Edit Data
                    </div>
                    <div class="card-body">
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
                        <form action="" method="POST">
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-3 col-form-label">name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-3 col-form-label">email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $email ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-3 col-form-label">password</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $password ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="user_type" class="col-sm-3 col-form-label">user_type</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="user_type" id="user_type">
                                        <option value="">- user_type -</option>
                                        <option value="user" <?php if ($user_type == "user") echo "selected" ?>>user</option>
                                        <option value="admin" <?php if ($user_type == "admin") echo "selected" ?>>admin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-7 col-sm-12">
                <!-- untuk mengeluarkan data -->
                <div class="card">
                    <div class="card-header text-white bg-secondary">
                        Daftar Akun
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">id</th> -->
                                    <th scope="col">name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">password</th>
                                    <th scope="col">user_type</th>
                                    <th scope="col">aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql2   = "select * from user_form order by id desc";
                                $q2     = mysqli_query($koneksi, $sql2);
                                $urut   = 1;
                                while ($r2 = mysqli_fetch_array($q2)) {
                                    $id   = $r2['id'];
                                    $name           = $r2['name'];
                                    $email          = $r2['email'];
                                    $password       = $r2['password'];
                                    $user_type      = $r2['user_type'];

                                ?>
                                    <tr>
                                        <!-- <th scope="row"><?php echo $urut++ ?></th> -->
                                        <td scope="row"><?php echo $name ?></td>
                                        <td scope="row"><?php echo $email ?></td>
                                        <td scope="row"><?php echo $password ?></td>
                                        <td scope="row"><?php echo $user_type ?></td>
                                        <td scope="row">
                                            <a href="akun_admin.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                            <a href="akun_admin.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>