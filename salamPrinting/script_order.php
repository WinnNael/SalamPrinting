<?php

$produk    = "";
$nama      = "";
$no_hp     = "";
$alamat    = "";
$file      = "";
$status    = "";

$sukses    = "";
$error     = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id_transaksi   = $_GET['id_transaksi'];
    $sql1           = "delete from transaksi where id_transaksi = '$id_transaksi'";
    $q1             = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses     = "Berhasil hapus data";
        header("refresh:5;url=order_admin.php", true, 301);
    }else{
        $error      = "Gagal melakukan delete data";
        header("refresh:5;url=order_admin.php", true, 301);//5 : detik
    }
}
if ($op == 'edit') {
    $id_transaksi   = $_GET['id_transaksi'];
    $sql1           = "select * from transaksi where id_transaksi = '$id_transaksi'";
    $q1             = mysqli_query($koneksi, $sql1);
    $r1             = mysqli_fetch_array($q1);
    $produk         = $r1['produk'];
    $nama           = $r1['nama'];
    $no_hp          = $r1['no_hp'];
    $alamat         = $r1['alamat'];
    $file           = $r1['file'];
    $status         = $r1['status'];

    if ($nama == '') {
        $error      = "Data tidak ditemukan";
        header("refresh:5;url=order_admin.php", true, 301);//5 : detik
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $produk         = $_POST['produk'];
    $nama           = $_POST['nama'];
    $no_hp          = $_POST['no_hp'];
    $alamat         = $_POST['alamat'];
    $status         = $_POST['status'];

    if ($produk && $nama && $no_hp && $alamat && $status) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update transaksi set produk = '$produk', nama = '$nama', no_hp = '$no_hp', alamat = '$alamat', status = '$status' where id_transaksi = '$id_transaksi'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
                header("refresh:5;url=order_admin.php", true, 301);
            } else {
                $error  = "Data gagal diupdate";
                header("refresh:5;url=order_admin.php", true, 301);//5 : detik
            }
        } else { //untuk insert
            $sql1   = "insert into transaksi(produk,nama,no_hp,alamat,status) values ('$produk','$nama','$no_hp','$alamat','$status')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
                header("refresh:5;url=order_admin.php", true, 301);
            } else {
                $error      = "Gagal memasukkan data";
                header("refresh:5;url=order_admin.php", true, 301);//5 : detik
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
        header("refresh:5;url=order_admin.php", true, 301);//5 : detik
    }
}

?>