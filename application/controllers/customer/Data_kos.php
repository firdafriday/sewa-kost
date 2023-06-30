<?php
	
	class Data_kos extends CI_Controller{
		public function index(){

			$data['kos'] = $this->rental_model->get_data('kos')->result();
			$this->load->view('templates_customer/header');
			$this->load->view('customer/data_kos', $data);
			$this->load->view('templates_customer/footer');
		}

		public function detail_kos($id){

			$data['detail'] = $this->rental_model->ambil_id_kos($id);
			$data['rental'] = $this->db->query("SELECT * FROM customer cs, kos mb WHERE mb.nama_rental = cs.nama_rental AND mb.id_kos = '$id'")->result();
			$this->load->view('templates_customer/header');
			$this->load->view('customer/detail_kos', $data);
			$this->load->view('templates_customer/footer');
		}
	}
?>