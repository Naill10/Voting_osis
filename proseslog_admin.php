<?php
session_start();
include "pages/header/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi,
        "SELECT * FROM tbl_admin 
         WHERE username='$username' AND password='$password'"
    );

    $login = mysqli_num_rows($query);

    ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php if ($login > 0): 
      $data = mysqli_fetch_assoc($query);
      $_SESSION['admin'] = $data['username'];
?>
<script>
Swal.fire({
  icon: 'success',
  title: 'Login Berhasil!',
  text: 'Selamat datang 👋',
  timer: 2000,
  showConfirmButton: false
}).then(() => {
  window.location = 'pages/dashboard/dashboard.php';
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
  window.location = 'admin_login.php';
});
</script>
<?php endif; ?>

</body>
</html>
<?php } ?>
