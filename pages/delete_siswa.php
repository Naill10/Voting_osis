<?php
include("config.php");



//ambil id dari url
$id = $_GET["id"] ?? null;

//proses delete
mysqli_query($koneksi ,"DELETE FROM tbl_siswa WHERE id_siswa='$id'");

//kembali ke halamaan siswa

header("Location: siswa.php");
exit;


?>