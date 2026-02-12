<?php
include "../header/config.php";

$current_page = basename($_SERVER["PHP_SELF"]);

//$current_page = siswa.php (isi dari alamat)
//$_SERVER["PHP_SELF"] ini adala variabel bawaan php yng beirisi alamat file yang sedang dibuka
//basename() adalah fungsi php untu ngambil nama file saja adri sbeuah path


//ambil id dari url
$id = $_GET["id"] ?? null;

//proses delete
mysqli_query($koneksi ,"DELETE FROM tbl_siswa WHERE id_siswa='$id'");

//kembali ke halamaan siswa

header("Location: siswa.php");
exit;


?>
