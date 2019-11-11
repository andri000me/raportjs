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
<div class="row">
  <div class="col-lg-12">
   <form role="form" method="post" action="<?= site_url('nilai/cari') ?>">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Ketikan nama siswa..." name="keyword">
      <span class="input-group-btn">
        <button class="btn btn-info" type="submit">Go!</button>
      </span>
    </div>
   </form>
  </div>
</div>
<p></p>
<div class="tabel-responsive">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>NIS</th>
        <th>Nama Siswa</th>
        <th>Nama Mapel</th>
				<th>Guru</th>
        <th>Nilai</th>
				<th>Updated</th>
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
				<td><?= $row['nama'];?></td>
				<td><?= $row['nama_mapel'];?></td>
        <td><?= $row['guru'];?></td>
        <td><?= $row['nilai'];?></td>
				<td><?= $row['tanggal'];?></td>
				<td>
          <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModalEdit" onclick="edit('<?= $row['id_nilai'];?>')"><i class="fa fa-pencil" ></i></a> 
          <a href="<?= site_url('nilai/hapus/'.$row['id_nilai']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')"><i class="fa fa-times"></i></a> 
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
        <form role="form" method="post" action="<?= site_url('nilai/simpan');?>">
        	<div class="form-group">
            <label>Siswa</label>
            <select class="form-control" name="nis">
              <option>Pilih Siswa</option>

      <?php foreach ($siswa->result_array() as $rowsiswa) {?>
        <option value="<?= $rowsiswa['nis']; ?>">
          <?= $rowsiswa['nama']; ?>
        </option>
      <?php } ?>

            </select>
          </div>
        	<div class="form-group">
            <label>Mata Pelajaran</label>
            <select class="form-control" name="mapel">
              <option>Pilih Mata Pelajaran</option>

      <?php foreach ($mapel->result_array() as $rowmapel) {?>
        <option value="<?= $rowmapel['id_mapel']; ?>">
          <?= $rowmapel['nama_mapel']; ?>
        </option>
      <?php } ?>

            </select>
          </div>
          <div class="form-group">
            <label>Nilai</label>
            <input type="number" name="nilai" class="form-control" required="required">
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
      <form role="form" method="post" action="<?= site_url('nilai/update'); ?>">
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
    
    var id_nilai=id;

    $.ajax({
      type: "post",
      url : "<?= site_url('nilai/edit') ?>",
      data: "id_nilai="+id_nilai,
      success: function(data) {
        console.log(data);
        $("#tempat_edit").html(data);
      }
    });

  }
</script>


