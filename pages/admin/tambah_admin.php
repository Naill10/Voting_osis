<?php
include "../header/header.php";
include "../header/config.php";


$current_page = basename($_SERVER["PHP_SELF"]);

//$current_page = siswa.php (isi dari alamat)
//$_SERVER["PHP_SELF"] ini adala variabel bawaan php yng beirisi alamat file yang sedang dibuka
//basename() adalah fungsi php untu ngambil nama file saja adri sbeuah path

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
                    <input class="form-control mb-4" name="data_username" type="text" value="" id="" > 
                    <input type="file" name="foto" class="form-control mb-3" required>
                </div>
                 <div class="form-group">
                    <label for="exampleFormControlSelect1" class="mx-3">Password</label>
                    <input class="form-control" id="exampleFormControlSelect1" name="data_password" type="password" >
                 
                </div>
               
                <div class="form-group">
                    <label for="example-email-input" class="form-control-label mx-3">Email</label>
                    <input class="form-control" name="email" type="email" id="">
                </div>
              <div class="form-group">
                    <label for="example-url-input" class="form-control-label mx-3">Nama</label>
                    <input class="form-control" name="data_nama" type="text" value="" id="">
                </div>
                <div class="form-group">
                    <label for="example-url-input" class="form-control-label mx-3">Alamat</label>
                    <input class="form-control" name="alamat" type="text" value="" id="">
                </div>

                 <div class="text-center mt-4 mb-3">
                                    <button type="submit" class="btn btn-order btn-lg btn bg-gradient-primary">
                                        <i class="fa-solid fa-paper-plane"></i></i>Input Data
                                    </button>
                 </div>
  
            </form>
            </div>
            
<?php

$berhasil = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $username = $_POST['data_username'];
    $password = $_POST['data_password'];
    $email = $_POST['email'];
    $nama = $_POST['data_nama'];
    $alamat = $_POST['alamat'];



    $foto = $_FILES['foto']['name'];
    $tmp_foto = $_FILES['foto']['tmp_name'];

    $folder = "../../assets/img/";
    move_uploaded_file($tmp_foto, $folder . $foto);

    $query = "INSERT INTO `tbl_admin`(foto,username,password,email,nama_admin,alamat) 
        VALUES ('$foto','$username','$password','$email','$nama','$alamat')";


    
    if (mysqli_query($koneksi, $query)) {
        // echo "<div class='alert alert-success text-center'>Data Berhasil Disimpan</div>";
    } else {
        // echo "<div class='alert alert-danger text-center'>
        //         Gagal : " . mysqli_error($koneksi) . "
        //       </div>";
    }
    
    if ($query) {
        $berhasil = true;
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
