<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/'); ?> vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <script>
		function ondelete(id, officername) {
			$("#delete-data").html("")
			let layout =
				`<form action="<?php echo site_url('dashboard/delete_petugas');?>" method="POST" >Menghapus <input type="text" name="officer_name" readonly value="${officername}"> dengan id <input type="text" name="petugas_id" readonly value="${id}"><button type="submit" class="btn btn--radius-2 btn-danger btn-block mt-3">Delete</button></form>`
			$("#delete-data").append(layout)
		}

		function onupdate(id, officername, officerusername, officerphone) {
			$("#update-data").html("");
			let layoutupdate = `<div class="card card-7">
						<div class="card-body">
							<form method="POST" action="<?php echo site_url('dashboard/update_petugas'); ?>">
								<div class="form-group">
									<div class="name">ID</div>
									<div class="value">
										<div class="input-group">
											<input class="form-control" type="text" name="id_officer" readonly value="${id}"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="name">Nama</div>
									<div class="value">
										<div class="input-group">
											<input class="form-control" type="text" name="name_officer" value="${officername}"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="name">Username</div>
									<div class="value">
										<div class="input-group">
											<input class="form-control" type="text" name="username_officer" value="${officerusername}"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="name">Password</div>
									<div class="value">
										<div class="input-group">
											<input class="form-control" type="password"
												name="password_officer" />
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="name">No Telepon</div>
									<div class="value">
										<div class="input-group">
											<input type="text" class="form-control" name="telepon_officer" value="${officerphone}">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="name">Position</div>
									<div class="value">
										<div class="input-group">
											<div class="rs-select2 js-select-simple select--no-search">
												<select class="form-control" name="position_officer">
													<option disabled="disabled" selected="selected">Choose
														option</option>
													<option value="admin">Admin</option>
													<option value="petugas">Officer</option>
												</select>
												<div class="select-dropdown"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="text-center">
									<button class="btn btn--radius-2 btn-success btn-block btn-lg" type="submit">
										Submit
									</button>
								</div>
							</form>
						</div>
					</div>`
			$("#update-data").append(layoutupdate)
		}

	</script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-phone-square-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Lapor Kuy!!! </div>
      </a>

 <!-- Divider -->
 <hr class="sidebar-divider">

<div class="sidebar-heading">
  Dashboard
</div>

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?php echo site_url('dashboard/homeadmin');?>">
    <i class="fas fa-fw fa-database"></i>
    <span>Data Pengaduan</span></a>
</li>

<li class="nav-item active">
  <a class="nav-link" href="<?php echo site_url('dashboard/datapetugas');?>">
    <i class="fas fa-fw fa-database"></i>
    <span>Data Petugas</span></a>
</li>

<li class="nav-item ">
  <a class="nav-link" href="<?php echo site_url('dashboard/datamasyarakat');?>">
    <i class="fas fa-fw fa-database"></i>
    <span>Data Masyarakat</span></a>
</li>


<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="<?php echo site_url('dashboard/inputpetugas');?>">
    <i class="fas fa-fw fa-envelope-open"></i>
    <span>Input Petugas</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Account
</div>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
    <i class="fa fa-minus-circle"></i>
    <span>Sign Out</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

        

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('username') ?></span>
              <img class="img-profile rounded-circle"
									src="<?php echo base_url('assets/img/pp.jpeg');?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

      <!-- Begin Page Content -->
				<div class="container-fluid">

<div class="container my-3 text-right">
  <button type="button" class="btn btn-primary"><a href="<?= site_url('dashboard/print_pdf') ?>"
      style="text-decoration: none; color: white;">Cetak
      PDF</a></button>
  <button type="button" class="btn btn-primary"><a href="<?= site_url('dashboard/print_xls') ?>"
      style="text-decoration: none; color: white;">Cetak
      XLS</a></button>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-center">Data Petugas</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Username</th>
            <th>Telephone</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($petugas as $datap) {
          ?>
          <tr>
            <th><?php echo $datap->id_petugas?></th>
            <td><?php echo $datap->nama_petugas?></td>
            <td><?php echo $datap->level?></td>
            <td><?php echo $datap->username?></td>
            <td><?php echo $datap->telp?></td>
            <td>
              <button type="button" class="btn btn-success" data-toggle="modal"
                data-target="#editModal"
                onclick="onupdate('<?php echo $datap->id_petugas?>', '<?php echo $datap->nama_petugas?>', '<?php echo $datap->username?>', '<?php echo $datap->telp?>')">Edit</button>
              <button type="button" class="btn btn-danger" data-toggle="modal"
                data-target="#deleteModal"
                onclick="ondelete('<?php echo $datap->id_petugas?>', '<?php echo $datap->nama_petugas?>')">Delete</button>
            </td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

  <!-- Modal Edit-->
  <div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
       </button>
  </div>
  <div class="modal-body" id="update-data">
  </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
          </div>
       </div>
  </div>
  </div>

  <!-- Modal Delete-->
  <div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Officer</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="modal-body" id="delete-data">

  </div>
  <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Understood</button>
         </div>
      </div>
    </div>
  </div>

      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">×</span>
                        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
           <div class="modal-footer">
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                   <a class="btn btn-primary" href="<?php echo site_url('dashboard/logout');?>">Logout</a>
               </div>
            </div>
         </div>
      </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    
    

 

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>

</body>

</html>
