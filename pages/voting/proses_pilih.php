<?php
session_start();
include "../header/config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id_calon = $_POST['id_calon'];
    $tanggal = date('Y-m-d H:i:s');

    // 🔥 AMBIL ID SISWA dari session
    $id_siswa = $_SESSION['id_siswa'];

    // 🔥 CEK apakah sudah voting
    $cek = mysqli_query($koneksi, "
        SELECT * FROM tbl_casis 
        WHERE id_siswa='$id_siswa'
    ");

    if (mysqli_num_rows($cek) > 0) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        Swal.fire({
            icon: 'warning',
            title: 'Oops!',
            text: 'Anda sudah melakukan voting!',
            confirmButtonColor: '#3085d6'
        }).then(() => {
            window.location = '../../index.php';
        });
        </script>
        ";
        exit;
    }

    // 🔥 INSERT jika belum voting
    $insert = mysqli_query($koneksi, "
        INSERT INTO tbl_casis (id_calon, tanggal, id_siswa)
        VALUES ('$id_calon', '$tanggal', '$id_siswa')
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

