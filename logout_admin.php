<?php


session_start();
session_destroy(); // hapus semua session
header("Location: admin_login.php"); // kembali ke login
exit;

?>