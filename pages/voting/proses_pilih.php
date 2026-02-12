<?php
session_start();
include "../header/config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id_calon = $_POST['id_casis'];
    $tanggal = date('Y-m-d H:i:s');

    $insert = mysqli_query($koneksi, "
        INSERT INTO tbl_casis (id_casis, tanggal, id_siswa)
        VALUES ('$id_calon', '$tanggal', 0)
    ");

    if ($insert) {
        $_SESSION['vote_sukses'] = true;
    } else {
        $_SESSION['vote_error'] = true;
    }

    header("Location: ../../index.php");
    exit;
}
?>





<?php if ($berhasil) { ?>
<script>
Swal.fire({
  icon: 'success',
  title: 'Data Berhasil Input!',
  showConfirmButton: false,
  timer: 2000
}).then(() => {
  window.location.href = "index.php";
});
</script>
<?php } ?>

