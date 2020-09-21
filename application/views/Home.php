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
    
    .shadow {
        margin-top: 20%;
        margin-left: 13%;
        width: 70%;
        border: solid 1px;
    }
  
   
    
    form{
        width: 80%;
        margin-bottom: 20px;
        margin-left: 70px;
    }
  
  
    hr.new4 {
        border: 1px solid ;
        width: 700px;
        margin-bottom: 30px;
    }
    p {
        margin-top: 10px;
        margin-left: 50px;
    }
  
    h2 {
        text-align: center;
        margin-top: 5%;
    }
    h4 {
        text-align: center;
        margin-bottom: -150px;
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
    <span class="active">Laporan</span></a>
</li>
  <li class="nav-item">
  <a class="nav-link" href="<?php echo site_url('dashboard/tanggapan');?>">
    <i class="fas fa-fw fa-envelope-open"></i>
    <span>Tanggapan</span></a>
</li>
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

    <!-- end navbar -->
    <!-- Form -->
    <div class="container">
        <h2>Layanan Aspirasi dan Pengaduan Online Rakyat</h2>
        <hr class="garis">
        <h4>Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</h4>
        <div class="shadow  mb-5 bg-white rounded">
            <nav class="navbar mb-4 navbar-dark bg-dark">
                <p> Untuk laporan terkait COVID-19, gunakan hashtag #CORONA dan pilih kategori CORONA</p>
            </nav>
            <form method="POST" action="<?php echo site_url('dashboard/insert_laporan'); ?>">
            <div class="value">
                <label for="">Tanggal Pengaduan</label>
                <input type="date" class="form-control" name="tanggal">
            </div>
            <div class="form-group">
                <label for="">NIK</label>
                <input type="text" class="form-control" placeholder="<?= $this->session->userdata('telp') ?>" name="nik_adu">
            </div>
          
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Isi laporan</label>
                <textarea class="form-control" name="isi" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">File</label>
                <input type="file" class="form-control-file" name="file">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Status</label>
                <select class="form-control" name="status_adu">
                <option>Proses</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
    <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Lapor Kuy!!!</div></div>
        </footer>


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