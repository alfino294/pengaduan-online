<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<link rel="stylesheet" href="assets/style.css">

</head>

<style>
	.navbar{
    background-color: rgb(148, 205, 228);
    color: white;
}

td{
    padding-left: 20px;
 }

.jumbotron{
    width: 50%;
    margin-left: 310px;
    margin-top: 90px;
    background-color: rgb(246, 245, 245);
}
</style>

<body>

<nav class="navbar">
  <a class="navbar-brand" >
  <i class="fas fa-phone-square-alt"></i>
    Lapor Kuy!!!
  </a>
</nav>

<div class="jumbotron">
    <div class="container">
        <table border="0" style="width: 500px;">
        <form action="<?php echo site_url('Dashboard/check_login'); ?>" method="post">
            <tr>
                <td rowspan="5"><img src="<?php echo base_url(); ?>assets/img/password.jpg" width="250px" alt=""></td>
                <td style="font-size: 30px;">Login</td>
            </tr>
            <tr>
                <td><input type="text" name="Username" class="form-control" placeholder="masukan Email"></td>
            </tr>
            <tr>
                <td><input type="password" name="Password" class="form-control" placeholder="masukan password"></td>
            </tr>
            <tr>
                <td><button type="submit" style="margin-left: 140px;" type="button" class="btn btn-outline-primary">MASUK</button></td>
            </tr>
            <tr>
                <td><P style="font-size: small;">Belum memiliki akun? <a href="<?php echo site_url('dashboard/register');?>"> Daftar disini</a></P></td>
            </tr>
        </table>
      
    </div>
  </div>
</form>
</body>


</html>