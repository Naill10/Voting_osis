<?php
include "../header/config.php";
//ambil id dari url
//kalau diurl ada id, simpan ke var $id
//kalau gaada, isi var $id dengan null, jadi $id = null

$id = $_GET['id'] ?? null;

$current_page = basename($_SERVER["PHP_SELF"]);

//$current_page = siswa.php (isi dari alamat)
//$_SERVER["PHP_SELF"] ini adala variabel bawaan php yng beirisi alamat file yang sedang dibuka
//basename() adalah fungsi php untu ngambil nama file saja adri sbeuah path



//ambil id 
if ($id) {
    $query = mysqli_query($koneksi,"SELECT * FROM `tbl_siswa` WHERE id_siswa = '$id'");
    $siswa = mysqli_fetch_assoc($query);
//mysqli_fecth_assoc akan mengambil 1 baris data hasil dari query

}
//update$
$berhasil = false;
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama  = $_POST['data_nama'];
    $kelas = $_POST['data_kelas'];
    $jurusan = $_POST['data_jurusan'];
    $alamat = $_POST['data_alamat'];    
   // CEK UPLOAD FOTO
    if (!empty($_FILES['foto']['name'])) {
        $folder   = "../../assets/img/";
        $namaFile = $_FILES['foto']['name'];
        $tmpFile  = $_FILES['foto']['tmp_name'];

        $namabaru = time() . "_" . $namaFile;
        move_uploaded_file($tmpFile, $folder . $namabaru);

        // UPDATE DENGAN FOTO
        $sql = "UPDATE tbl_siswa SET
                nama='$nama',
                kelas='$kelas',
                jurusan='$jurusan',
                alamat='$alamat',
                foto='$namabaru'
                WHERE id_siswa='$id'";

    } else {

        // UPDATE TANPA FOTO
        $sql = "UPDATE tbl_siswa SET
                nama='$nama',
                kelas='$kelas',
                jurusan='$jurusan',
                alamat='$alamat'
                WHERE id_siswa='$id'";
    }


   $query= mysqli_query($koneksi, $sql);

   
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
              <h6>Authors Form Edit</h6>
              <form method="POST" enctype="multipart/form-data">

  <!-- Nama -->
  <div class="form-group mb-3">
    <label class="form-control-label mx-3">Name</label>
    <input
      type="text"
      name="data_nama"
      class="form-control"
      value="<?= $siswa['nama']; ?>"
      required
    >
  </div>

  <!-- Foto -->
  <div class="form-group mb-4">
    <label class="form-control-label mx-3 d-block">Foto Sebelumnya</label>

    <img
      src="../../assets/img/<?= $siswa['foto']; ?>"
      width="100"
      alt="Foto Siswa"
      class="rounded mb-2 d-block"
    >

    <input
      type="file"
      name="foto"
      class="form-control"
      accept="image/*"
    >
  </div>

  <!-- Kelas -->
  <div class="form-group mb-3">
    <label class="mx-3">Kelas</label>
    <input
      type="text"
      name="data_kelas"
      class="form-control"
      value="<?= $siswa['kelas']; ?>"
      required
    >
  </div>

  <!-- Jurusan -->
  <div class="form-group mb-3">
    <label class="form-control-label mx-3">Jurusan</label>
    <input
      type="text"
      name="data_jurusan"
      class="form-control"
      value="<?= $siswa['jurusan']; ?>"
      required
    >
  </div>

  <!-- Alamat -->
  <div class="form-group mb-4">
    <label class="form-control-label mx-3">Alamat</label>
    <input
      type="text"
      name="data_alamat"
      class="form-control"
      value="<?= $siswa['alamat']; ?>"
      required
    >
  </div>

  <!-- Button -->
  <div class="text-center">
    <button
      type="submit"
      class="btn btn-lg bg-gradient-danger px-5"
    >
      <i class="fa-solid fa-paper-plane me-2"></i>
      Input Data
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

<?php if ($berhasil) { ?>
<script>
Swal.fire({
  icon: 'success',
  title: 'Data Berhasil Input!',
  showConfirmButton: false,
  timer: 2000
}).then(() => {
  window.location.href = "siswa.php";
});
</script>
<?php } ?>

      </footer>
    </div>