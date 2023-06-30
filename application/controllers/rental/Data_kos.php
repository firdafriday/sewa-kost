<?php


class Data_kos extends CI_Controller{
	public function index(){
		$this->rental_model->rental_login();

		$where = array(
			'nama_rental'	=> $this->session->userdata('nama_rental')
		);
		$data['kos'] = $this->rental_model->get_where($where,'kos')->result();
		$data['type'] = $this->rental_model->get_data('type')->result();

		$this->load->view('templates_rental/header');
		$this->load->view('templates_rental/sidebar');
		$this->load->view('rental/Data_kos',$data);
		$this->load->view('templates_rental/footer');
	}

	public function tambah_kos(){ 
		$this->rental_model->rental_login();
		$data['type'] = $this->rental_model->get_data('type')->result();
		$this->load->view('templates_rental/header');
		$this->load->view('templates_rental/sidebar');
		$this->load->view('rental/form_tambah_kos',$data);
		$this->load->view('templates_rental/footer');
	}

	public function tambah_kos_aksi(){
		$this->rental_model->rental_login();
		$this->_rules();
		if($this->form_validation->run() == FALSE){
			$this->tambah_kos();
		}else{
			$nama_rental			= $this->input->post('nama_rental');
			$kode_type				= $this->input->post('kode_type');
			$merk					= $this->input->post('merk');
			$no_plat				= $this->input->post('no_plat');
			$warna					= $this->input->post('warna');
			$tahun					= $this->input->post('tahun');
			$status					= $this->input->post('status');
			$harga					= $this->input->post('harga');
			$denda					= $this->input->post('denda');
			$ac						= $this->input->post('ac');
			$supir					= $this->input->post('supir');
			$mp3_player				= $this->input->post('mp3_player');
			$central_lock			= $this->input->post('central_lock');
			$gambar					= $_FILES['gambar']['name'];
			
			if($gambar='0'){}else{
				$config['upload_path']		= './assets/upload';
				$config['allowed_types']	= 'jpg|jpeg|png|tiff|webp';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('gambar')){
					echo "Gambar Kos Gagal diupload!";
				}else{
					$gambar = $this->upload->data('file_name');
				}
			}

			$data = array(
				'nama_rental'		=> $nama_rental,
				'kode_type'			=> $kode_type,
				'merk'				=> $merk,
				'no_plat'			=> $no_plat,
				'tahun'				=> $tahun,
				'warna'				=> $warna,
				'status'			=> $status,
				'harga'				=> $harga,
				'denda'				=> $denda,
				'ac'				=> $ac,
				'supir'				=> $supir,
				'mp3_player'		=> $mp3_player,
				'central_lock'		=> $central_lock,
				'gambar'			=> $gambar,
			);

			$this->rental_model->insert_data($data, 'kos');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data Kost Berhasil Ditambahkan
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('rental/data_kos');
		}
	}


	public function update_kos($id){
		$this->rental_model->rental_login();

		$where = array('id_kos' => $id);
		$data['kos'] = $this->db->query("SELECT * FROM kos mb, type tp WHERE mb.kode_type=tp.kode_type AND mb.id_kos='$id'")->result();

		if($data['kos']['0']->nama_rental != $this->session->userdata('nama_rental')){
			redirect('rental/data_kos');
		}else{
		}

		$data['type'] = $this->rental_model->get_data('type')->result();

		$this->load->view('templates_rental/header');
		$this->load->view('templates_rental/sidebar');
		$this->load->view('rental/form_update_kos',$data);
		$this->load->view('templates_rental/footer');

	}

	public function update_kos_aksi(){
		$this->rental_model->rental_login();
		$this->_rules();
		if($this->form_validation->run() == FALSE){
			$this->update_kos($this->input->post('id_kos'));
		}else{
			$id 					= $this->input->post('id_kos');
			$kode_type				= $this->input->post('kode_type');
			$merk					= $this->input->post('merk');
			$no_plat				= $this->input->post('no_plat');
			$warna					= $this->input->post('warna');
			$tahun					= $this->input->post('tahun');
			$status					= $this->input->post('status');
			$harga					= $this->input->post('harga');
			$denda					= $this->input->post('denda');
			$ac						= $this->input->post('ac');
			$supir					= $this->input->post('supir');
			$mp3_player				= $this->input->post('mp3_player');
			$central_lock			= $this->input->post('central_lock');
			$gambar					= $_FILES['gambar']['name'];
			
			if($gambar){
				$config['upload_path']		= './assets/upload';
				$config['allowed_types']	= 'jpg|jpeg|png|tiff|webp';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar')){
					$gambar = $this->upload->data('file_name');
					$this->db->set('gambar', $gambar);
				}else{
					echo $this->upload->display_errors();
				}
			}

			$data = array(
				'kode_type'			=> $kode_type,
				'merk'				=> $merk,
				'no_plat'			=> $no_plat,
				'tahun'				=> $tahun,
				'warna'				=> $warna,
				'status'			=> $status,
				'harga'				=> $harga,
				'denda'				=> $denda,
				'ac'				=> $ac,
				'supir'				=> $supir,
				'mp3_player'		=> $mp3_player,
				'central_lock'		=> $central_lock,
			);

			$where = array(
				'id_kos' => $id
			);

			$this->rental_model->update_data('kos', $data, $where);

			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data Kost Berhasil Diupdate
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('rental/data_kos');
		}
	}

	public function _rules(){

		$this->form_validation->set_rules('kode_type','Kode Type','required');
		$this->form_validation->set_rules('merk','Merk','required');
		$this->form_validation->set_rules('no_plat','No Plat','required');
		$this->form_validation->set_rules('tahun','Tahun','required');
		$this->form_validation->set_rules('warna','Warna','required');
		$this->form_validation->set_rules('status','Status','required');
		$this->form_validation->set_rules('harga','Harga','required');
		$this->form_validation->set_rules('denda','Denda','required');
	}


	public function detail_kos($id){
		$this->rental_model->rental_login();

		$where = array('id_kos' => $id);
		$data['kos'] = $this->db->query("SELECT * FROM kos mb, type tp WHERE mb.kode_type=tp.kode_type AND mb.id_kos='$id'")->result();

		if($data['kos']['0']->nama_rental != $this->session->userdata('nama_rental')){
			redirect('rental/data_kos');
		}else{
		}

		$data['detail'] = $this->rental_model->ambil_id_kos($id);

		$this->load->view('templates_rental/header');
		$this->load->view('templates_rental/sidebar');
		$this->load->view('rental/detail_kos',$data);
		$this->load->view('templates_rental/footer');

	}

	public function delete_kos($id){
		$this->rental_model->rental_login();


		$where = array('id_kos' => $id);
		$data['kos'] = $this->db->query("SELECT * FROM kos mb, type tp WHERE mb.kode_type=tp.kode_type AND mb.id_kos='$id'")->result();

		if($data['kos']['0']->nama_rental != $this->session->userdata('nama_rental')){
			redirect('rental/data_kos');
		}else{
		}

		$this->rental_model->delete_data($where,'kos');

		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data Kost Berhasil Dihapus
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
		redirect('rental/data_kos');
	}
}
?>