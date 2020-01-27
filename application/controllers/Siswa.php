<?php
class Siswa extends CI_controller {
		
	function __construct() {
		parent:: __construct();
		//load model siswa
		$this->load->model('Model_siswa');
		//load model kelas
		$this->load->model('Model_kelas');
		//agar user login dulu
		if(!$this->session->userdata('logged_in')) {redirect('login','refresh');}
	}

	function index() {
		$data['judul']="Data Siswa";
		$data['konten']=$this->Model_siswa->viewAll();
		// memunculkan dropdown dinamis dari kelas
		$data['kelas']=$this->Model_kelas->getAll();
		//$this->load->view('data_siswa',$data);
		$this->template->display('data_siswa',$data);
	}

	function simpan() {
		$nis=$this->input->post('nis',true);
		$nama=$this->input->post('nama',true);
		$password=$this->input->post('password',true);
		$alamat=$this->input->post('alamat',true);
		$kota_kab=$this->input->post('kota_kab',true);
		$gender=$this->input->post('gender',true);
		$kelas=$this->input->post('kelas',true);
		$simpan=$this->Model_siswa->simpan($nis,$nama,md5($password),$alamat,$kota_kab,$gender,$kelas);
		$simpan=$this->Model_siswa->simpan($nis,$nama,md5($password),$alamat,$kota_kab,$gender,$kelas);
		//untuk pesan operasi berhasil
		$this->session->set_flashdata('info','Data Berhasil Masuk!');
		redirect('siswa');
	}

	//menampilkan edit data
	function edit() {
		$nis=$this->input->post('nis',true);
		$data=$this->Model_siswa->edit($nis);
		$datakelas=$this->Model_kelas->getAll();
		$result=$data->row();
		if(!strcmp($result->gender, 'L')) {
			$L='selected';
			$P='';
		} else {
			$L='';
			$P='selected';
		}
		?>		  
          <div class="form-group">
            <label>NIS</label>
            <input type="text" name="nis" class="form-control" required="required" value="<?= $result->nis; ?>" readonly>
          </div>
          <div class="form-group">
            <label>Nama siswa</label>
            <input type="text" name="nama" class="form-control" required="required" value="<?= $result->nama; ?>">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required="required">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat"><?= $result->alamat; ?></textarea>
          </div>
          <div class="form-group">
            <label>Kota/Kab</label>
            <input type="text" name="kota_kab" class="form-control" required="required" value="<?= $result->kota_kab; ?>">
          </div>
          <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="gender">
              <option value="L" <?= $L;?>>Laki-laki</option>
              <option value="P" <?= $P;?>>Perempuan</option>
            </select>
          </div>          
          <div class="form-group">
            <label>Kelas</label>
            <select class="form-control" name="kelas">
              <option>pilih Kelas</option>
              <?php foreach ($datakelas->result_array() as $rowkelas) {
              	$pilihkelas=$this->Model_kelas->edit($rowkelas['kode_kelas'])->row();
              	if (!(strcmp($result->kelas, $pilihkelas->kode_kelas))) {
				      $selected="selected";
				    } else { 
				      $selected="";
				    } 
              	?>
		        <option value="<?= $rowkelas['kode_kelas']; ?>" <?= $selected;?>>
		          <?= $rowkelas['nama_kelas']; ?>
		        </option>
		      <?php } ?>
            </select>
          </div>
		<?php
	}

	function update() {
		$nis=$this->input->post('nis',true);
		$nama=$this->input->post('nama',true);
		$password=$this->input->post('password',true);
		$alamat=$this->input->post('alamat',true);
		$kota_kab=$this->input->post('kota_kab',true);
		$gender=$this->input->post('gender',true);
		$kelas=$this->input->post('kelas',true);
		// $update=$this->Model_siswa->update($nis,$nama,password_hash($password, PASSWORD_BCRYPT),$alamat,$kota_kab,$gender,$kelas);
		$update=$this->Model_siswa->update($nis,$nama,md5($password),$alamat,$kota_kab,$gender,$kelas);
		$this->session->set_flashdata('info','Data Berhasil Diubah!');
		redirect('siswa');
	}

	function hapus() {
		$nis=$this->uri->segment(3);
		$hapus=$this->Model_siswa->hapus($nis);
		//untuk pesan operasi berhasil
		$this->session->set_flashdata('info','Data Berhasil Dihapus!');
		redirect('siswa');
	}

}