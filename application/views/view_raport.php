<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" href="<?php echo base_url()."/assets/"; ?>favicon.ico">

    <title><?php echo $judul; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()."/assets/"; ?>css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()."/assets/"; ?>font-awesome/css/font-awesome.min.css">
    
  </head>

  <body>

<!-- navbar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= site_url('raport');?>">Raport</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">       
        <li><a href="<?= site_url('raport');?>"><i class="fa fa-book"></i> Raport</a></li>
        <li><a href="<?= site_url('grafik_siswa');?>"><i class="fa fa-tachometer"></i> Grafik</a></li>
        <li><a href="<?= site_url('login/logout');?>" onclick="return confirm('yakin mau keluar??')"><i class="fa fa-sign-out"></i> Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- navbar -->
<div class="container">  
  <div class="jumbotron">
    <h1>Selamat Datang</h1>
    <p>Ini adalah aplikasi raport online dengan Framework CodeIgniter</p>
  </div>

  <table class="table table-hover">
    <thead>
    <tr class="danger">
      <th>No</th>
      <th>NIS</th>
      <th>Nama</th>
      <th>Mapel</th>
      <th>Guru</th>
      <th>Nilai</th>
      <th>Predikat</th>
    </tr>
    </thead>
    <tbody>
<?php 
$jumlah=0;
$rerata=0;
$no=0;
foreach($konten->result_array() as $row) {
$no++;
 ?>
      <tr class="warning">
      <td><?= $no; ?></td>
      <td><?= $row['nis']; ?></td>
      <td><?= $row['nama']; ?></td>
      <td><?= $row['nama_mapel']; ?></td>
      <td><?= $row['guru']; ?></td>
      <td><?= $row['nilai']; ?></td>
      <td><?php 
      if($row['nilai']>=85) {
        echo "A";
      } else if($row['nilai']>=70) {
        echo "B";
      } else {
        echo "C";
      }
      $jumlah=$jumlah+$row['nilai'];

      ?></td>
      </tr>
<?php } ?>
      <tr class="success">
        <td colspan="5">Jumlah</td>
        <td><?= $jumlah ?></td>
        <td></td>
      </tr>
      <tr class="info">
        <td colspan="5">Rerata</td>
        <td><?= $rerata=$jumlah/$no; ?></td>
        <td></td>
      </tr>
    </tbody>
  </table>
  <p align="center">    
    <a href="#" class="btn btn-primary" onclick="window.print();"><i class="fa fa-print"></i> Cetak</a>
  </p>
</div>

  <!-- JavaScript -->
    <script src="<?php echo base_url()."/assets/"; ?>js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url()."/assets/"; ?>js/bootstrap.js"></script>

  </body>
</html>