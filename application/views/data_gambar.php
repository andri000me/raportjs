<!-- alert -->
<?php if($this->session->flashdata('info')) { ?>
<div class="alert alert-success" role="alert">
  <?= $this->session->flashdata('info');?>
</div>
<?php } ?>
<!-- alert -->

<div class="panel-heading">
	<h3 class="panel-title">
	<i class="fa fa-table"></i>	<?= $judul; ?>
	</h3>
</div>

<div class="panel-body">
		<p><a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal">
			<i class="fa fa-plus"></i> Tambah
		</a></p>
<div class="tabel-responsive">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>NIS</th>
				<th>Gambar</th>
				<th>Aktif</th>
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
				<td><?= $row['nis'];?></td>
				<td><img src="<?= base_url().'foto/'.$row['gambar'];?>" width="80px" height="80px" class='img-thumbnail' ></td>
				<td><?= $row['aktif'];?></td>
				<td>
          <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModalEdit" onclick="edit('<?= $row['id'];?>')"><i class="fa fa-pencil" ></i></a> 
          <a href="<?= site_url('gambar/hapus/'.$row['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')"><i class="fa fa-times"></i></a> 
        </td>
			</tr>
<?php } ?>
		</tbody>		
	</table>
</div>
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
        <form role="form" method="post" action="<?= site_url('gambar/simpan');?>" enctype="multipart/form-data">
        	<div class="form-group">
        		<label>NIS</label>
            <select name="nis" class="form-control">
        		<?php foreach ($siswa->result_array() as $rowsiswa) {?>
              <option value="<?= $rowsiswa['nis']; ?>">
                <?= $rowsiswa['nama']; ?>
              </option>
            <?php } ?>
            </select>
        	</div>
        	<div class="form-group">
        		<label>Gambar</label>
        		<input type="file" name="gambar" class="form-control" required="required">
        	</div>
        	<div class="form-group">
        		<label>Aktif</label>
        		<select class="form-control" name="aktif">
        			<option value="yes">YES</option>
        			<option value="no">NO</option>
        		</select>
        	</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
        <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>        
        </form>
      </div>
    </div>

  </div>
</div>
<!-- modal  -->

<!-- modal edit -->
<div id="myModalEdit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Data</h4>
      </div>
      <form role="form" method="post" action="<?= site_url('kelas/update'); ?>">
      <div class="modal-body" id="tempat_edit">
      
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
        <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>        
        </form>
      </div>
    </div>

  </div>
</div>
<!-- modal edit -->

<script type="text/javascript">
  function edit(id) {
    
    var kode_kelas=id;

    $.ajax({
      type: "post",
      url : "<?= site_url('gambar/edit') ?>",
      data: "id="+id,
      success: function(data) {
        console.log(data);
        $("#tempat_edit").html(data);
      }
    });

  }
</script>


