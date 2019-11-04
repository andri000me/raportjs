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
				<th>Kode mapel</th>
        <th>Nama mapel</th>
				<th>Guru</th>
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
				<td><?= $row['id_mapel'];?></td>
        <td><?= $row['nama_mapel'];?></td>
				<td><?= $row['guru'];?></td>
				<td><?= $row['aktif'];?></td>
				<td>
          <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModalEdit" onclick="edit('<?= $row['id_mapel'];?>')"><i class="fa fa-pencil" ></i></a> 
          <a href="<?= site_url('mapel/hapus/'.$row['id_mapel']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')"><i class="fa fa-times"></i></a> 
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
        <form role="form" method="post" action="<?= site_url('mapel/simpan');?>">
        	<div class="form-group">
        		<label>ID mapel</label>
        		<input type="text" name="id_mapel" class="form-control" required="required">
        	</div>
        	<div class="form-group">
        		<label>Nama mapel</label>
        		<input type="text" name="nama_mapel" class="form-control" required="required">
        	</div>
          <div class="form-group">
            <label>Nama Guru</label>
            <input type="text" name="guru" class="form-control" required="required">
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
      <form role="form" method="post" action="<?= site_url('mapel/update'); ?>">
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
    
    var id_mapel=id;

    $.ajax({
      type: "post",
      url : "<?= site_url('mapel/edit') ?>",
      data: "id_mapel="+id_mapel,
      success: function(data) {
        console.log(data);
        $("#tempat_edit").html(data);
      }
    });

  }
</script>


