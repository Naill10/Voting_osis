<?php
include "../header/header.php";
include "../header/config.php";

$berhasil = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama    = $_POST['data_nama'];
    $kelas   = $_POST['data_kelas'];
    $jurusan = $_POST['data_jurusan'];
    $alamat  = $_POST['data_alamat'];
    $email   = $_POST['data_email'];

    // folder upload
    $folder = "../../assets/img/";

    // pastikan folder ada
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    // ambil file
    $namaFile = $_FILES["foto"]["name"];
    $tmpFile  = $_FILES["foto"]["tmp_name"];
    $error    = $_FILES["foto"]["error"];

    $namabaru = null;

    // jika ada file yang diupload
    if ($error === 0) {
        $ext = pathinfo($namaFile, PATHINFO_EXTENSION);
        $namabaru = time() . "_" . uniqid() . "." . $ext;
        move_uploaded_file($tmpFile, $folder . $namabaru);
    }

    $query = mysqli_query($koneksi, "INSERT INTO tbl_siswa 
        (nama, kelas, jurusan, email, alamat, foto)
        VALUES ('$nama','$kelas','$jurusan','$email','$alamat','$namabaru')");

    if ($query) {
        $berhasil = true;
    } else {
        echo "Gagal: " . mysqli_error($koneksi);
    }
}
?>






    <div class="container-fluid py-4">
      <div class="row">
       <div class="col-12">
  <div class="card mb-3 shadow-sm">
    <div class="card-header pb-0">
      <h6 class="mb-3">Authors Form</h6>

      <form method="POST" enctype="multipart/form-data">
        <!-- Name -->
        <div class="form-group mb-3">
          <label class="form-control-label mx-3">Name</label>
          
          <input
            class="form-control mb-3"
            name="data_nama"
            type="text"
            required
          >
          <input type="file" name="foto" class="form-control " required>
        </div>

        <!-- Kelas -->
        <div class="form-group mb-3">
          <label class="mx-3">Kelas</label>
          <select
            class="form-control"
            name="data_kelas"
            required
          >
            <option>X-1</option>
            <option>X-2</option>
            <option>X-3</option>
          </select>
        </div>

        <!-- Email -->
        <div class="form-group mb-3">
          <label class="form-control-label mx-3">Email</label>
          <input
            class="form-control"
            name="data_email"
            type="email"
            required
          >
        </div>

        <!-- Jurusan -->
        <div class="form-group mb-3">
          <label class="form-control-label mx-3">Jurusan</label>
          <input
            class="form-control"
            name="data_jurusan"
            type="text"
            required
          >
        </div>

        <!-- Alamat -->
        <div class="form-group mb-4">
          <label class="form-control-label mx-3">Alamat</label>
          <input
            class="form-control"
            name="data_alamat"
            type="text"
            required
          >
        </div>

        <!-- Button -->
        <div class="text-center">
          <button
            type="submit"
            class="btn btn-lg bg-gradient-primary px-5"
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

