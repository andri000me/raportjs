<div class="panel-heading">
	<h3 class="panel-title">
	<i class="fa fa-table"></i>	<?= $judul; ?>
	</h3>
</div>

<div class="panel-body">
		<p><a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal">
			<i class="fa fa-plus"></i> Tambah
		</a></p>

	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Kelas</th>
				<th>Nama Kelas</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
<?php 
$no=0;
foreach($konten->result_array() as $row) { 
$no++;
?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?= $row['kode_kelas'];?></td>
				<td><?= $row['nama_kelas'];?></td>
				<td><?= $row['aktif'];?></td>
				<td>XXX</td>
			</tr>
<?php } ?>
		</tbody>		
	</table>
</div>


<!-- modal  -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data</h4>
      </div>
      <div class="modal-body">
        <form role="form">
        	<div class="form-group">
        		<label>Kode kelas</label>
        		<input type="text" name="kode_kelas" class="form-control" required="required">
        	</div>
        	<div class="form-group">
        		<label>Nama kelas</label>
        		<input type="text" name="nama_kelas" class="form-control" required="required">
        	</div>
        	<div class="form-group">
        		<label>Aktif</label>
        		<select class="form-control" name="status">
        			<option value="yes">YES</option>
        			<option value="no">NO</option>
        		</select>
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- modal  -->