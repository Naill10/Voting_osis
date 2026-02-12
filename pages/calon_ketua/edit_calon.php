<?php
include "../header/config.php";

$id = $_GET['id'] ?? null;

$current_page = basename($_SERVER["PHP_SELF"]);

//$current_page = siswa.php (isi dari alamat)
//$_SERVER["PHP_SELF"] ini adala variabel bawaan php yng beirisi alamat file yang sedang dibuka
//basename() adalah fungsi php untu ngambil nama file saja adri sbeuah path

//ambil id 
if ($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_voting WHERE id_calon='$id'");
    $siswa = mysqli_fetch_assoc($query);
//mysqli_fecth_assoc akan mengambil 1 baris data hasil dari query

}

$berhasil = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $calon_ketua = $_POST['nama_calon'];
    $pos_visi    = $_POST['visi'];
    $pos_kelas    = $_POST['kelas'];

    // CEK UPLOAD FOTO
    if (!empty($_FILES['foto']['name'])) {

        $folder   = "../../assets/img/";
        $namaFile = $_FILES['foto']['name'];
        $tmpFile  = $_FILES['foto']['tmp_name'];

        $namabaru = time() . "_" . $namaFile;
        move_uploaded_file($tmpFile, $folder . $namabaru);

        // UPDATE DENGAN FOTO
        $sql = "UPDATE tbl_voting SET
                nama_calon='$calon_ketua',
                visi='$pos_visi',
                kelas='$pos_kelas',
                foto='$namabaru'
                WHERE id_calon='$id'";

    } else {

        // UPDATE TANPA FOTO
        $sql = "UPDATE tbl_voting SET
                nama_calon='$calon_ketua',
                visi='$pos_visi',
                kelas='$pos_kelas'
                WHERE id_calon='$id'";
    }

    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        $berhasil = true;
    }
}



include "../header/header.php";
?>




    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-1">
            <div class="card-header pb-0">
              <h6>Authors Form</h6>
              <form method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label class="form-control-label mx-3">Nama Calon</label>
    <input
      class="form-control"
      name="nama_calon"
      type="text"
      value="<?= $siswa['nama_calon'] ?>"
      required
    >
  </div>

  <div class="form-group">
    <label class="mx-3">Visi</label>
    <input
      class="form-control"
      name="visi"
      type="text"
      value="<?= $siswa['visi'] ?>"
      required
    >
  </div>

  <div class="form-group">
    <label class="form-control-label mx-3">Kelas</label>
<input
  class="form-control"
  name="kelas"
  type="text"
  value="<?= $siswa['kelas'] ?>"
  required
>

  </div>

  <!-- FOTO LAMA -->
  <div class="form-group">
    <label class="form-control-label mx-3">Foto Saat Ini</label><br>
    <img
      src="../../assets/img/<?= $siswa['foto'] ?>"
      width="100"
      class="rounded mb-2"
    >
  </div>

  <!-- FOTO BARU -->
  <div class="form-group">
    <label class="form-control-label mx-3">Ganti Foto</label>
    <input
      class="form-control"
      name="foto"
      type="file"
      accept="image/*"
    >
  </div>

  <div class="text-center mt-4 mb-3">
    <button type="submit" class="btn btn-lg bg-gradient-secondary">
      <i class="fa-solid fa-paper-plane me-2"></i>
      Update Data
    </button>
  </div>

</form>

            </div>
            

          </div>
        </div>
      </div>
     
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>

      <?php if ($berhasil) { ?>
<script>
Swal.fire({
  icon: 'success',
  title: 'Data Berhasil Input!',
  showConfirmButton: false,
  timer: 2000
}).then(() => {
  window.location.href = "calon_ketua.php";
});
</script>
<?php } ?>
    </div>
