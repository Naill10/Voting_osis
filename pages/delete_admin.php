<?php
include("config.php");



//ambil id dari url
$id = $_GET["id"] ?? null;

//proses delete
mysqli_query($koneksi ,"DELETE FROM tbl_admin WHERE id_admin='$id'");

//kembali ke halamaan siswa

header("Location: admin.php");
exit;


?>