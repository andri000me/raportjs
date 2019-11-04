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
        <th>Nama siswa</th>
        <th>Alamat</th>
        <th>Kota/Kab</th>
				<th>Gender</th>
				<th>Kelas</th>
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
        <td><?= $row['alamat'];?></td>
        <td><?= $row['kota_kab'];?></td>
				<td><?= $row['gender'];?></td>
				<td><?= $row['nama_kelas'];?></td>
				<td>
          <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModalEdit" onclick="edit('<?= $row['nis'];?>')"><i class="fa fa-pencil" ></i></a> 
          <a href="<?= site_url('siswa/hapus/'.$row['nis']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')"><i class="fa fa-times"></i></a> 
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
        <form role="form" method="post" action="<?= site_url('siswa/simpan');?>">
        	<div class="form-group">
            <label>NIS</label>
            <input type="text" name="nis" class="form-control" required="required">
          </div>
          <div class="form-group">
            <label>Nama siswa</label>
            <input type="text" name="nama" class="form-control" required="required">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="guru" class="form-control" required="required">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Kota/Kab</label>
            <input type="text" name="kota_kab" class="form-control" required="required">
          </div>
          <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="gender">
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>          
          <div class="form-group">
            <label>Kelas</label>
            <select class="form-control" name="kelas">
              <option>Pilih Kelas</option>

      <?php foreach ($kelas->result_array() as $rowkelas) {?>
        <option value="<?= $rowkelas['kode_kelas']; ?>">
          <?= $rowkelas['nama_kelas']; ?>
        </option>
      <?php } ?>

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
      <form role="form" method="post" action="<?= site_url('siswa/update'); ?>">
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
    
    var nis=id;

    $.ajax({
      type: "post",
      url : "<?= site_url('siswa/edit') ?>",
      data: "nis="+nis,
      success: function(data) {
        console.log(data);
        $("#tempat_edit").html(data);
      }
    });

  }
</script>


