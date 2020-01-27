<?php
foreach ($konten->result_array() as $row) {
	$mapel[]=$row['nama_mapel'];
	$nilai[]=(int)$row['nilai'];
}
?>

<script src="<?php echo base_url()."/assets/"; ?>js/jquery-1.10.2.js"></script>
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
<div class="panel-heading">
	<h3 class="panel-title">
	<i class="fa fa-table"></i>	<?= $judul; ?>
	</h3>
</div>

<div class="panel-body">
		
<div class="row">
  <div class="col-lg-12">
   <form role="form" method="post" action="<?= site_url('grafik/cari') ?>">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Ketikan nis siswa..." name="nis">
      <span class="input-group-btn">
        <button class="btn btn-info" type="submit">Go!</button>
      </span>
    </div>
   </form>
  </div>
</div>
<p></p>
<div class="tabel-responsive ct-chart">

</div>
</div>

