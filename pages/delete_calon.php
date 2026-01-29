<?php
include("config.php");



//ambil id dari url
$id = $_GET["id"] ?? null;

//proses delete
mysqli_query($koneksi ,"DELETE FROM tbl_voting WHERE id_calon='$id'");

//kembali ke halamaan siswa

header("Location: calon_ketua.php");
exit;


?>