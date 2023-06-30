<?php
	
	class Dashboard extends CI_Controller{
		public function index(){

			// $data['kos'] = $this->rental_model->get_data('kos')->result();
			$data['kos'] = $this->db->query("SELECT * FROM kos mb, type tp WHERE mb.kode_type=tp.kode_type")->result();

			$data['rental'] = $this->db->query("SELECT nama_rental FROM customer WHERE nama_rental != ''")->result();

			$data['type'] = $this->rental_model->get_data('type')->result();
			$data['total_kos'] = $this->db->query("SELECT * FROM kos WHERE status = '1'")->num_rows()-1;
			$data['total_customer'] = $this->db->query("SELECT * FROM customer WHERE role_id = '2'")->num_rows()-1;
			$data['total_rental'] = $this->db->query("SELECT * FROM customer WHERE role_id = '3'")->num_rows()-1;

			$this->load->view('templates_customer/header');
			$this->load->view('customer/dashboard', $data);
			$this->load->view('templates_customer/footer');
		}

		public function detail_kos($id){

			$data['detail'] = $this->rental_model->ambil_id_kos($id);
			$this->load->view('templates_customer/header');
			$this->load->view('customer/detail_kos', $data);
			$this->load->view('templates_customer/footer');
		}
	}
?>