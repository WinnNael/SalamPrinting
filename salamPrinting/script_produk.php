<?php

$nama_produk   = "";
$deskripsi     = "";

$sukses    = "";
$error     = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id_produk      = $_GET['id_produk'];
    $sql1           = "delete from produk where id_produk = '$id_produk'";
    $q1             = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses     = "Berhasil hapus data";
        header("refresh:5;url=produk_admin.php", true, 301);
    }else{
        $error      = "Gagal melakukan delete data";
        header("refresh:5;url=produk_admin.php", true, 301);//5 : detik
    }
}
if ($op == 'edit') {
    $id_produk      = $_GET['id_produk'];
    $sql1           = "select * from produk where id_produk = '$id_produk'";
    $q1             = mysqli_query($koneksi, $sql1);
    $r1             = mysqli_fetch_array($q1);
    $nama_produk    = $r1['nama_produk'];
    $deskripsi      = $r1['deskripsi'];

    if ($nama_produk == '') {
        $error      = "Data tidak ditemukan";
        header("refresh:5;url=produk_admin.php", true, 301);//5 : detik
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $nama_produk     = $_POST['nama_produk'];
    $deskripsi       = $_POST['deskripsi'];

    if ($nama_produk && $deskripsi) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update produk set nama_produk = '$nama_produk', deskripsi = '$deskripsi' where id_produk = '$id_produk'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
                header("refresh:5;url=produk_admin.php", true, 301);
            } else {
                $error  = "Data gagal diupdate";
                header("refresh:5;url=produk_admin.php", true, 301);//5 : detik
            }
        } else { //untuk insert
            $sql1   = "insert into produk(nama_produk,deskripsi) values ('$nama_produk','$deskripsi')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
                header("refresh:5;url=produk_admin.php", true, 301);
            } else {
                $error      = "Gagal memasukkan data";
                header("refresh:5;url=produk_admin.php", true, 301);//5 : detik
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
        header("refresh:5;url=produk_admin.php", true, 301);//5 : detik
    }
}

?>