<?php
include "../header/config.php";


$id = $_GET['id'] ?? null;

$current_page = basename($_SERVER["PHP_SELF"]);

//$current_page = siswa.php (isi dari alamat)
//$_SERVER["PHP_SELF"] ini adala variabel bawaan php yng beirisi alamat file yang sedang dibuka
//basename() adalah fungsi php untu ngambil nama file saja adri sbeuah path

//ambil id 
if ($id) {
    $query = mysqli_query($koneksi,"SELECT * FROM `tbl_admin` WHERE id_admin = '$id'");
    $siswa = mysqli_fetch_assoc($query);
//mysqli_fecth_assoc akan mengambil 1 baris data hasil dari query

}
//update
$berhasil = false;
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['data_username'];
    $password = $_POST['data_password'];
    $nama = $_POST['data_nama'];
    $alamat = $_POST['alamat'];
 

       // CEK UPLOAD FOTO
    if (!empty($_FILES['foto']['name'])) {
        $folder   = "../../assets/img/";
        $namaFile = $_FILES['foto']['name'];
        $tmpFile  = $_FILES['foto']['tmp_name'];

        $namabaru = time() . "_" . $namaFile;
        move_uploaded_file($tmpFile, $folder . $namabaru);

        // UPDATE DENGAN FOTO
        $sql = "UPDATE tbl_admin SET
                username='$username',
                password='$password',
                nama_admin='$nama',
                alamat='$alamat',
                foto='$namabaru'
                WHERE id_admin='$id'";

    } else {

        // UPDATE TANPA FOTO
        $sql = "UPDATE tbl_admin SET
                username='$username',
                nama_admin='$nama',
                password='$password',
                alamat='$alamat'
                WHERE id_admin='$id'";
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
              <h6>Authors Form</h6>
              <form method="Post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label mx-3">Username</label>
                    <input class="form-control" name="data_username" type="text" value="<?= $siswa['username'] ?>">
                    <div>
                    <label class="form-control-label mx-3 d-block">Foto Sebelumnya</label>
                   
                    <img src="../../assets/img/<?= $siswa['foto']; ?>" alt="" width="100px"> 
                    <input type="file" name="foto" class="form-control mb-3" >
                    </div>
                </div>
                 <div class="form-group">
                    <label for="exampleFormControlSelect1" class="mx-3">Password</label>
                    <input class="form-control" id="exampleFormControlSelect1" name="data_password" type="password" value="<?= $siswa['password'] ?>">
                 
                </div>
                <div class="form-group">
                    <label for="example-email-input" class="form-control-label mx-3">Name</label>
                    <input class="form-control" name="data_nama" type="text" id="" value="<?= $siswa['nama_admin'] ?>">
                </div>
                <div class="form-group">
                    <label for="example-url-input" class="form-control-label mx-3">Alamat</label>
                    <input class="form-control" name="alamat" type="text" value="<?= $siswa['alamat'] ?>">
                </div>

                 <div class="text-center mt-4 mb-3">
                                    <button type="submit" class="btn btn-order btn-lg btn bg-gradient-success">
                                        <i class="fa-solid fa-paper-plane"></i></i>Input Data
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
  window.location.href = "admin.php";
});
</script>
<?php } ?>

      </footer>
    </div>
    </div>
