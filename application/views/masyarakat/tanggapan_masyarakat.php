<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<style>
  .navbar{
    background-color: rgb(148, 205, 228);
    color: white;
   
}

.nav-link{
    color: gray;
}

.active{
    color: white;
}

.container-fluid{
  padding-top: 40px;
  width: 70%;
}

.table-bordered{
  width:70%;
  margin-left: 200px;
}
    

</style>
<body>
    <!-- Navbar -->
    <nav class="navbar">
  <a class="navbar-brand" >
  <i class="fas fa-phone-square-alt"></i>
    Lapor Kuy!!!
  </a>

  <ul class="nav justify-content-end">
 
  <li class="nav-item active">
  <a class="nav-link" href="<?php echo site_url('dashboard/tmplhome');?>">
    <i class="fas fa-fw fa-envelope-open"></i>
    <span>Laporan</span></a>
</li>
  <li class="nav-item">
  <a class="nav-link" href="<?php echo site_url('dashboard/tanggapan');?>">
    <i class="fas fa-fw fa-envelope-open"></i>
    <span  class="active">Tanggapan</span></a>
  <!-- Nav Item - User Information -->
  <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('username') ?></span>
            	<img class="img-profile rounded-circle" style="width: 30px;"
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

   <!-- Begin Page Content -->
   <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pengaduan</h1>
<p class="mb-4">Mencakup segala data pengaduan yang telah anda masukkan</p>

<!-- DataTales Example -->

  <hr>
    </div>
   
        <div class="table-responsive">
            <table class="table table-bordered"  id="dataTable"  cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Pengaudan</th>
                        <th>Tanggal Pengaduan</th>
                        <th>NIK</th>
                        <th>Isi laporan</th>
                        <th>foto</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($report as $data) {
                    ?>
                    <tr>
                        <th><?php echo $data->id_pengaduan?></th>
                        <td><?php echo $data->tgl_pengaduan?></td>
                        <td><?php echo $data->nik?></td>
                        <td><?php echo $data->isi_laporan?></td>
                        <td><img style="width: 300px;" src="<?= base_url('assets/img/');?><?= $data->foto ?>"></td>
                        <td><?php echo $data->status?></td>
                        <td><button type="button" class="btn btn-info view-data" data-toggle="modal" data-target="#infoModal" id="<?php echo $data->id_pengaduan?>">Info</button></td>
                       
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
   



<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
    <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Lapor Kuy!!!</div></div>
        </footer>


  <!-- Modal Info-->
	<div class="modal fade" id="infoModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Tanggapan</h5>
          <?= t ?>
					<button type="button" class="close"  data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="detail_result"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
				</div>
			</div>
		</div>
	</div>

      


        	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
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


         <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  
 
</body>
</html>