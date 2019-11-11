<?php
class Nilai extends CI_controller {
		
	function __construct() {
		parent:: __construct();
		//load model nilai
		$this->load->model('Model_nilai');
		$this->load->model('Model_siswa');
		$this->load->model('Model_mapel');
		//$this->load->library('session');
	}

	function index() {
		$data['judul']="Data Nilai";
		$data['konten']=$this->Model_nilai->viewAll();
		$data['siswa']=$this->Model_siswa->getAll();
		$data['mapel']=$this->Model_mapel->getAll();
		//$this->load->view('data_nilai',$data);
		$this->template->display('data_nilai',$data);
	}

	function simpan() {
		$nis=$this->input->post('nis',true);
		$mapel=$this->input->post('mapel',true);
		$nilai=$this->input->post('nilai',true);
		$simpan=$this->Model_nilai->simpan($nis,$mapel,$nilai);
		//untuk pesan operasi berhasil
		$this->session->set_flashdata('info','Data Berhasil Masuk!');
		redirect('nilai');
	}

	//menampilkan edit data
	function edit() {
		$id_nilai=$this->input->post('id_nilai',true);
		$data=$this->Model_nilai->edit($id_nilai);
		$siswa=$this->Model_siswa->getAll();
		$mapel=$this->Model_mapel->getAll();
		$result=$data->row();
		?>		
		<input type="hidden" name="id_nilai" value="<?= $result->id_nilai; ?>">  
          <div class="form-group">
            <label>Siswa</label>
            <select class="form-control" name="nis">
              <option>Pilih Siswa</option>

      <?php foreach ($siswa->result_array() as $rowsiswa) {
      	if (!(strcmp($result->nis, $rowsiswa['nis']))) {
	      $selected="selected";
	    } else { 
	      $selected="";
	    }
      ?>
        <option value="<?= $rowsiswa['nis']; ?>" <?= $selected; ?>>
          <?= $rowsiswa['nama']; ?>
        </option>
      <?php } ?>

            </select>
          </div>
        	<div class="form-group">
            <label>Mata Pelajaran</label>
            <select class="form-control" name="mapel">
              <option>Pilih Mata Pelajaran</option>

      <?php foreach ($mapel->result_array() as $rowmapel) {
      	if (!(strcmp($result->mapel, $rowmapel['id_mapel']))) {
	      $selectedMapel="selected";
	    } else { 
	      $selectedMapel="";
	    }
      	?>
        <option value="<?= $rowmapel['id_mapel']; ?>" <?= $selectedMapel; ?>>
          <?= $rowmapel['nama_mapel']; ?>
        </option>
      <?php } ?>

            </select>
          </div>
          <div class="form-group">
            <label>Nilai</label>
            <input type="number" name="nilai" class="form-control" required="required" value="<?= $result->nilai ?>">
          </div>
		<?php
	}

	function update() {
		$id_nilai=$this->input->post('id_nilai',true);
		$nis=$this->input->post('nis',true);
		$mapel=$this->input->post('mapel',true);
		$nilai=$this->input->post('nilai',true);
		$update=$this->Model_nilai->update($id_nilai,$nis,$mapel,$nilai);
		//untuk pesan operasi berhasil
		$this->session->set_flashdata('info','Data Berhasil Diubah!');
		redirect('nilai');
	}

	function hapus() {
		$id_nilai=$this->uri->segment(3);
		$hapus=$this->Model_nilai->hapus($id_nilai);
		//untuk pesan operasi berhasil
		$this->session->set_flashdata('info','Data Berhasil Dihapus!');
		redirect('nilai');
	}

	function cari() {
		$keyword=$this->input->post('keyword',true);
		$data['judul']="Data Nilai";
		$data['konten']=$this->Model_nilai->cari($keyword);
		$data['siswa']=$this->Model_siswa->getAll();
		$data['mapel']=$this->Model_mapel->getAll();
		//untuk pesan operasi berhasil
		$this->session->set_flashdata('info','Data Berhasil Ditemukan!');
		$this->template->display('data_nilai',$data);
	}

}