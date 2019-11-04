<?php
class Kelas extends CI_controller {
		
	function __construct() {
		parent:: __construct();
		//load model Kelas
		$this->load->model('Model_kelas');
		//$this->load->library('session');
	}

	function index() {
		$data['judul']="Data Kelas";
		$data['konten']=$this->Model_kelas->getAll();
		//$this->load->view('data_kelas',$data);
		$this->template->display('data_kelas',$data);
	}

	function simpan() {
		$kode_kelas=$this->input->post('kode_kelas',true);
		$nama_kelas=$this->input->post('nama_kelas',true);
		$aktif=$this->input->post('aktif',true);
		$simpan=$this->Model_kelas->simpan($kode_kelas,$nama_kelas,$aktif);
		//untuk pesan operasi berhasil
		$this->session->set_flashdata('info','Data Berhasil Masuk!');
		redirect('Kelas');
	}

	//menampilkan edit data
	function edit() {
		$kode_kelas=$this->input->post('kode_kelas',true);
		$data=$this->Model_kelas->edit($kode_kelas);
		$result=$data->row();
		if(strcmp($result->aktif, 'yes')) {
			$aktif='selected';
			$tidak='';
		} else {
			$aktif='';
			$tidak='selected';
		}
		?>		  
          <div class="form-group">
            <label>Kode kelas</label>
            <input type="text" name="kode_kelas" class="form-control" required="required" value="<?= $result->kode_kelas; ?>" readonly>
          </div>
          <div class="form-group">
            <label>Nama kelas</label>
            <input type="text" name="nama_kelas" class="form-control" required="required" value="<?= $result->nama_kelas; ?>">
          </div>
          <div class="form-group">
            <label>Aktif</label>
            <select class="form-control" name="aktif">
              <option value="yes" <?= $aktif; ?>>YES</option>
              <option value="no" <?= $aktif; ?>>NO</option>
            </select>
          </div>
		<?php
	}

	function update() {
		$kode_kelas=$this->input->post('kode_kelas',true);
		$nama_kelas=$this->input->post('nama_kelas',true);
		$aktif=$this->input->post('aktif',true);
		$update=$this->Model_kelas->update($kode_kelas,$nama_kelas,$aktif);
		//untuk pesan operasi berhasil
		$this->session->set_flashdata('info','Data Berhasil Diubah!');
		redirect('Kelas');
	}

	function hapus() {
		$kode_kelas=$this->uri->segment(3);
		$hapus=$this->Model_kelas->hapus($kode_kelas);
		//untuk pesan operasi berhasil
		$this->session->set_flashdata('info','Data Berhasil Dihapus!');
		redirect('Kelas');
	}

}