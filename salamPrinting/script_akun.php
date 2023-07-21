<?php

$name       = "";
$email      = "";
$password   = "";
$user_type  = "";

$sukses    = "";
$error     = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id             = $_GET['id'];
    $sql1           = "delete from user_form where id = '$id'";
    $q1             = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses     = "Berhasil hapus data";
        header("refresh:5;url=akun_admin.php", true, 301);
    }else{
        $error      = "Gagal melakukan delete data";
        header("refresh:5;url=akun_admin.php", true, 301);//5 : detik
    }
}
if ($op == 'edit') {
    $id             = $_GET['id'];
    $sql1           = "select * from user_form where id = '$id'";
    $q1             = mysqli_query($koneksi, $sql1);
    $r1             = mysqli_fetch_array($q1);
    $name           = $r1['name'];
    $email          = $r1['email'];
    $password       = $r1['password'];
    $user_type      = $r1['user_type'];

    if ($name == '') {
        $error      = "Data tidak ditemukan";
        header("refresh:5;url=akun_admin.php", true, 301);//5 : detik
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $name           = $_POST['name'];
    $email          = $_POST['email'];
    $password       = $_POST['password'];
    $user_type      = $_POST['user_type'];

    if ($name && $email && $password && $user_type) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update user_form set name = '$name', email = '$email', password = '$password', user_type = '$user_type' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
                header("refresh:5;url=akun_admin.php", true, 301);
            } else {
                $error  = "Data gagal diupdate";
                header("refresh:5;url=akun_admin.php", true, 301);//5 : detik
            }
        } else { //untuk insert
            $sql1   = "insert into user_form(name,email,password,user_type) values ('$name','$email','$password','$user_type')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
                header("refresh:5;url=akun_admin.php", true, 301);
            } else {
                $error      = "Gagal memasukkan data";
                header("refresh:5;url=akun_admin.php", true, 301);//5 : detik
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
        header("refresh:5;url=akun_admin.php", true, 301);//5 : detik
    }
}

?>