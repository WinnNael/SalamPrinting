<?php

@include 'config.php';
@include 'script_order.php';

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
    <title>Order</title>
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

            <div class="collapse navbar-collapse" id_transaksi="navbarSupportedContent">
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
                                <label for="produk" class="col-sm-3 col-form-label">Produk</label>
                                <div class="col-sm-10">
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
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-3 col-form-label">nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id_transaksi="nama" name="nama" value="<?php echo $nama ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="no_hp" class="col-sm-3 col-form-label">no_hp</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id_transaksi="no_hp" name="no_hp" value="<?php echo $no_hp ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-3 col-form-label">alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id_transaksi="alamat" name="alamat" value="<?php echo $alamat ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="file" class="col-sm-3 col-form-label">file</label>
                                <div class="col-sm-10">
                                    <td scope="row"><?php echo $file ?></td>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="status" class="col-sm-3 col-form-label">status</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="status">
                                        <option value="">- Pilih status -</option>
                                        <option value="baru" <?php if ($produk == "baru") echo "selected" ?>>baru</option>
                                        <option value="proses" <?php if ($produk == "proses") echo "selected" ?>>proses</option>
                                        <option value="selesai" <?php if ($produk == "selesai") echo "selected" ?>>selesai</option>
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
                        Daftar Order
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">produk</th>
                                    <th scope="col">nama</th>
                                    <th scope="col">no_hp</th>
                                    <th scope="col">alamat</th>
                                    <th scope="col">file</th>
                                    <th scope="col">status</th>
                                    <th scope="col">aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql2   = "select * from transaksi order by id_transaksi desc";
                                $q2     = mysqli_query($koneksi, $sql2);
                                while ($r2 = mysqli_fetch_array($q2)) {
                                    $id_transaksi   = $r2['id_transaksi'];
                                    $produk         = $r2['produk'];
                                    $nama           = $r2['nama'];
                                    $no_hp          = $r2['no_hp'];
                                    $alamat         = $r2['alamat'];
                                    $file           = $r2['file'];
                                    $status         = $r2['status'];

                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $produk ?></th>
                                        <td scope="row"><?php echo $nama ?></td>
                                        <td scope="row"><?php echo $no_hp ?></td>
                                        <td scope="row"><?php echo $alamat ?></td>
                                        <td scope="row"><a href="script_download.php?url=<?php echo $file ?>">Download</a></td>
                                        <td scope="row"><?php echo $status ?></td>
                                        <td scope="row">
                                            <a href="order_admin.php?op=edit&id_transaksi=<?php echo $id_transaksi ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                            <a href="order_admin.php?op=delete&id_transaksi=<?php echo $id_transaksi ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
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