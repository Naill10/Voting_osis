<?php
include "../header/header.php";
include "../header/config.php";

$current_page = basename($_SERVER["PHP_SELF"]);

//$current_page = siswa.php (isi dari alamat)
//$_SERVER["PHP_SELF"] ini adala variabel bawaan php yng beirisi alamat file yang sedang dibuka
//basename() adalah fungsi php untu ngambil nama file saja adri sbeuah path



?>



<head>
  
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

  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
           
            <div class="card-header pb-0 d-flex flex-column">
            
                 <a href="tambah_admin.php"><button type="button" class="btn bg-gradient-primary" >Tambah Admin</button></a>
              
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 align-middle text-center">
                        No
                      </td>  
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Password</th>
                       <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                      
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <?php 


                    $no =1;
                    $data = mysqli_query($koneksi, "SELECT * FROM tbl_admin");
                     foreach($data as $row):
                  ?>
                  <tbody>
                    <tr>
                        <td class="text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"><?php echo $no++; ?></span>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../../assets/img/<?php echo $row['foto']; ?>" class="avatar avatar-sm me-3" alt="user1">
                            
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $row['username']; ?></h6>

                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $row['password']; ?></p>
                        
                      </td>
                       <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $row['email']; ?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"><?php echo $row['nama_admin']; ?></span>
                      </td>
                    
                        <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $row['alamat']; ?></span>
                      </td>
                   <td class="align-middle text-center">
                       <a href="edit_admin.php?id=<?= $row['id_admin']; ?>"
                       class="btn btn-sm btn bg-gradient-warning">
                       edit
                      </a>
                        <a href="#" 
                        class="btn btn-sm btn bg-danger text-white"
                        onclick="HapusSiswa(<?= $row['id_admin']; ?>)">
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
function HapusSiswa(id) {
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
        window.location.href = 'delete_admin.php?id=' + id;
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
