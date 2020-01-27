<?php
foreach ($konten->result_array() as $row) {
  $mapel[]=$row['nama_mapel'];
  $nilai[]=(int)$row['nilai'];
}
?>
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
    
    <!-- Chatist -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    

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
        <li><a href="<?= site_url('raport/grafik');?>"><i class="fa fa-tachometer"></i> Grafik</a></li>
        <li><a href="<?= site_url('login/logout');?>" onclick="return confirm('yakin mau keluar??')"><i class="fa fa-sign-out"></i> Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- navbar -->
<div class="container">  
  
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">
      <i class="fa fa-table"></i> <?= $judul; ?>
      </h3>
    </div>
    <div class="panel-body ct-chart"></div>
    
  </div>

  <p align="center">    
    <a href="#" class="btn btn-primary" onclick="window.print();"><i class="fa fa-print"></i> Cetak</a>
  </p>
</div>

  <!-- JavaScript -->
    <script src="<?php echo base_url()."/assets/"; ?>js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url()."/assets/"; ?>js/bootstrap.js"></script>

<script type="text/javascript">
$(function() {
  var data = {
    // A labels array that can contain any sort of values
    labels: <?= json_encode($mapel);?>,
    // Our series array that contains series objects or in this case series data arrays
    series: [
      <?= json_encode($nilai);?>
    ]
  };
  var options = {
    height: 600
  };
  new Chartist.Bar('.ct-chart', data, options);
});
</script>

  </body>
</html>