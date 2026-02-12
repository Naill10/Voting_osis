<?php
session_start();
include("pages/header/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   $username = $_POST['username'];
   $password = $_POST['pass'];

   $query = mysqli_query($koneksi, 
     "SELECT * FROM tbl_siswa 
      WHERE username='$username' AND password='$password'"
   );

   $login = mysqli_num_rows($query);
   $data  = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php if ($login == 1): 
      $_SESSION['login'] = true;
      $_SESSION['nama_siswa'] = $data['nama_siswa'];
      $_SESSION['id_siswa'] = $data['id_siswa'];
?>
<script>
Swal.fire({
  icon: 'success',
  title: 'Login Berhasil!',
  text: 'Selamat datang <?= $data['nama_siswa']; ?> 👋',
  timer: 2000,
  showConfirmButton: false
}).then(() => {
  window.location = 'index.php';
});
</script>

<?php else: ?>
<script>
Swal.fire({
  icon: 'error',
  title: 'Login Gagal!',
  text: 'Username atau password salah!',
  confirmButtonColor: '#dc3545'
}).then(() => {
  window.location = 'index_login.php';
});
</script>
<?php endif; ?>

</body>
</html>
<?php } ?>
