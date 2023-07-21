<?php 

$produk    = "";
$nama      = "";
$no_hp     = "";
$alamat    = "";
$status    = "";

$sukses    = "";
$error     = "";

if (isset($_POST['simpan'])) {
	$produk = $_POST['produk'];
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$status = "baru";
	$namaFile = $_FILES['file']['name'];
	$x = explode('.', $namaFile);
	$ekstensiFile = strtolower(end($x));
	$ukuranFile	= $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];
	
	// Lokasi Penempatan file
	$dirUpload = "file/";
	$linkBerkas = $dirUpload.$namaFile;
	
	// Menyimpan file
	$terupload = move_uploaded_file($file_tmp, $linkBerkas);
	
	if ($terupload == 1) {
		$sql1   = "insert into transaksi(produk,nama,no_hp,alamat,file,status) values ('$produk','$nama','$no_hp','$alamat','$linkBerkas','$status')";
		$q1     = mysqli_query($koneksi, $sql1);
		if ($q1) {
			$sukses     = "Berhasil membuat order";
			header("refresh:5;url=index.php", true, 301);//5 : detik
		} else {
			$error     = "Gagal membuat order";
			header("refresh:5;url=order_customer.php", true, 301);//5 : detik
		}
	} else {
		$error     = "Gagal membuat order";
		header("refresh:5;url=order_customer.php", true, 301);//5 : detik
	}
}

 ?>