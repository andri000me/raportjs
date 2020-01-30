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
	 <form role="form" method="post" action="<?= site_url('admin/update');?>">
			<div class="form-group">
        		<label>Username</label>
        		<input type="text" name="username" class="form-control" readonly="readonly" value="<?= $username; ?>">
        	</div>
        	<div class="form-group">
        		<label>Password</label>
        		<input type="password" name="password" class="form-control" required="required">
        	</div>
        	<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
       		<button type="reset" class="btn btn-danger" ><i class="fa fa-times"></i> Cancel</button> 
    </form> 
</div>