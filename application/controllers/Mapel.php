<?php
class Mapel extends CI_controller {
		
	function __construct() {
		parent:: __construct();
		//load model mapel
		$this->load->model('Model_mapel');
		if(!$this->session->userdata('logged_in')) {redirect('login','refresh');}
	}

	function index() {
		$data['judul']="Data Mata Pelajaran";
		$data['konten']=$this->Model_mapel->getAll();
		//$this->load->view('data_mapel',$data);
		$this->template->display('data_mapel',$data);
	}

	function simpan() {
		$id_mapel=$this->input->post('id_mapel',true);
		$nama_mapel=$this->input->post('nama_mapel',true);
		$guru=$this->input->post('guru',true);
		$aktif=$this->input->post('aktif',true);
		$simpan=$this->Model_mapel->simpan($id_mapel,$nama_mapel,$guru,$aktif);
		//untuk pesan operasi berhasil
		$this->session->set_flashdata('info','Data Berhasil Masuk!');
		redirect('mapel');
	}

	//menampilkan edit data
	function edit() {
		$id_mapel=$this->input->post('id_mapel',true);
		$data=$this->Model_mapel->edit($id_mapel);
		$result=$data->row();
		?>		  
          <div class="form-group">
            <label>ID mapel</label>
            <input type="text" name="id_mapel" class="form-control" required="required" value="<?= $result->id_mapel; ?>" readonly>
          </div>
          <div class="form-group">
            <label>Nama mapel</label>
            <input type="text" name="nama_mapel" class="form-control" required="required" value="<?= $result->nama_mapel; ?>">
          </div>
          <div class="form-group">
            <label>Guru</label>
            <input type="text" name="guru" class="form-control" required="required" value="<?= $result->guru; ?>">
          </div>
          <div class="form-group">
            <label>Aktif</label>
            <select class="form-control" name="aktif">
              <option value="yes">YES</option>
              <option value="no">NO</option>
            </select>
          </div>
		<?php
	}

	function update() {
		$id_mapel=$this->input->post('id_mapel',true);
		$nama_mapel=$this->input->post('nama_mapel',true);
		$guru=$this->input->post('guru',true);
		$aktif=$this->input->post('aktif',true);
		$update=$this->Model_mapel->update($id_mapel,$nama_mapel,$guru,$aktif);
		//untuk pesan operasi berhasil
		$this->session->set_flashdata('info','Data Berhasil Diubah!');
		redirect('mapel');
	}

	function hapus() {
		$id_mapel=$this->uri->segment(3);
		$hapus=$this->Model_mapel->hapus($id_mapel);
		//untuk pesan operasi berhasil
		$this->session->set_flashdata('info','Data Berhasil Dihapus!');
		redirect('mapel');
	}

}