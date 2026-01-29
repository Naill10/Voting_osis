<?php
include("config.php");

$id = $_GET['id'] ?? null;

//ambil id 
if ($id) {
    $query = mysqli_query($koneksi,"SELECT * FROM `tbl_voting` WHERE id_calon = '$id'");
    $siswa = mysqli_fetch_assoc($query);
//mysqli_fecth_assoc akan mengambil 1 baris data hasil dari query

}
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $calon_ketua = $_POST['nama_calon'];
    $pos_visi = $_POST['visi'];
    $pos_misi = $_POST['misi'];
    $pos_foto = $_POST['foto'];


    mysqli_query($koneksi, "UPDATE tbl_voting set nama_calon='$calon_ketua',
    visi= '$pos_visi', misi='$pos_misi', foto='$pos_foto' where id_calon = '$id'");

    header("location: calon_ketua.php");
    exit;
  }



include("header.php");
?>




    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-1">
            <div class="card-header pb-0">
              <h6>Authors Form</h6>
              <form method="Post">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label mx-3">Nama Calon</label>
                    <input class="form-control" name="nama_calon" type="text" value="<?= $siswa['nama_calon'] ?>">
                </div>
                 <div class="form-group">
                    <label for="exampleFormControlSelect1" class="mx-3">Visi</label>
                    <input class="form-control" id="exampleFormControlSelect1" name="visi" type="" value="<?= $siswa['visi'] ?>" >
                 
                </div>
                <div class="form-group">
                    <label for="example-email-input" class="form-control-label mx-3">Misi</label>
                    <input class="form-control" name="misi" type="text" value="<?= $siswa['misi'] ?>">
                </div>
                <div class="form-group">
                    <label for="example-url-input" class="form-control-label mx-3">Foto</label>
                    <input class="form-control" name="foto" type="text" value="<?= $siswa['foto'] ?>" id="">
                </div>

                 <div class="text-center mt-4 mb-3">
                                    <button type="submit" class="btn btn-order btn-lg btn bg-gradient-secondary">
                                        <i class="fa-solid fa-paper-plane"></i></i>Input Data
                                    </button>
                 </div>
  
            </form>
            </div>
            
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $calon_ketua = $_POST['nama_calon'];
    $pos_visi = $_POST['visi'];
    $pos_misi = $_POST['misi'];
    $pos_foto = $_POST['foto'];

    $query = "INSERT INTO `tbl_voting`(nama_calon,visi,misi,foto) 
VALUES ('$calon_ketua','$pos_visi','$pos_misi','$pos_foto')";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<div class='alert alert-success text-center'>Data Berhasil Disimpan</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>
                Gagal : " . mysqli_error($koneksi) . "
              </div>";
    }
}
?>
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