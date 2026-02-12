<?php
include "../header/header.php";
include "../header/config.php";


$current_page = basename($_SERVER["PHP_SELF"]);

//$current_page = siswa.php (isi dari alamat)
//$_SERVER["PHP_SELF"] ini adala variabel bawaan php yng beirisi alamat file yang sedang dibuka
//basename() adalah fungsi php untu ngambil nama file saja adri sbeuah path/
?>


 <style>

/* ===== Smooth Page Animation ===== */
.container-fluid {
  opacity: 0;
  transform: translateY(20px);
  animation: pageFade 0.8s ease forwards;
}

@keyframes pageFade {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* ===== Premium Card Look ===== */
.card {
  border-radius: 20px;
  transition: all 0.3s ease;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 40px rgba(0,0,0,0.08);
}

/* ===== Table Modern Effect ===== */
.table tbody tr {
  transition: all 0.3s ease;
}

.table tbody tr:hover {
  background: rgba(0,0,0,0.03);
  transform: scale(1.01);
}

/* ===== Button Upgrade ===== */
.btn {
  border-radius: 12px;
  transition: all 0.3s ease;
}

.btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

</style>



<body class="g-sidenav-show  bg-gray-100">

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
           
            <div class="card-header pb-0 d-flex flex-column">
            
                 <a href="tambah_calon.php"><button type="button" class="btn bg-gradient-primary" >Tambah Calon Ketua</button></a>
              
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-middle text-center">
                        No
                      </td>  
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Calon</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Visi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">kelas</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                      
                     
                    </tr>
                  </thead>
                  <?php 


                    $no =1;
                    $data = mysqli_query($koneksi, "SELECT * FROM tbl_voting");
                     foreach($data as $row):
                  ?>
                  <tbody>
  <tr>
    <!-- No -->
    <td class="text-center text-sm">
      <span class="badge badge-sm bg-gradient-success">
        <?php echo $no++; ?>
      </span>
    </td>

    <!-- Foto & Nama -->
    <td>
      <div class="d-flex align-items-center">
        <div class="me-3">
          <label for="foto-<?php echo $row['id_calon']; ?>">
            <img
              src="../../assets/img/<?php echo $row['foto']; ?>"
              width="50"
              height="50"
              class="rounded-circle"
            >
          </label>
        </div>

        <div class="d-flex flex-column justify-content-center">
          <h6 class="mb-0 text-sm">
            <?php echo $row['nama_calon']; ?>
          </h6>
        </div>
      </div>
    </td>

    <!-- Visi -->
    <td>
      <p class="text-xs font-weight-bold mb-0">
        <?php echo $row['visi']; ?>
      </p>
    </td>

    <!-- Misi -->
    <td class="align-middle text-center text-sm">
      <span class="badge badge-sm bg-gradient-success">
        <?php echo $row['kelas']; ?>
      </span>
    </td>

    <!-- Action -->
    <td class="align-middle text-center">
      <a
        href="edit_calon.php?id=<?= $row['id_calon']; ?>"
        class="btn btn-sm bg-gradient-warning me-1"
      >
        Edit
      </a>

      <a
        href="#"
        class="btn btn-sm bg-danger text-white"
        onclick="hapussiswa(<?= $row['id_calon']; ?>)"
      >
        Delete
      </a>
    </td>
  </tr>
</tbody>

<?php endforeach; ?>

                       


                </table>
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
  </main>
 <script>
function hapussiswa(id) {
  Swal.fire({
    title: 'Yakin hapus data?',
    text: 'Data yang dihapus tidak bisa dikembalikan!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Ya, hapus!',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {

      Swal.fire({
        icon: 'success',
        title: 'Data berhasil dihapus',
        showConfirmButton: false,
        timer: 2000
      });

      setTimeout(() => {
        window.location.href = 'delete_calon.php?id=' + id;
      }, 2000);

    } else if (result.dismiss === Swal.DismissReason.cancel) {

      Swal.fire({
        icon: 'info',
        title: 'Data tidak jadi dihapus',
        timer: 1500,
        showConfirmButton: false
      });

    }
  });
}
</script>
  </body>
