<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('person_model','person');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('server_view');
	}

	public function welcome()
	{
		$this->load->view('welcome_message');
	}

	public function client()
	{
		$this->load->view('person_view');
	}

	public function ajax_list()
	{
		$list = $this->person->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->mhs_nim;
			$row[] = $person->mhs_nama;
			$row[] = $person->mhs_alamat;
			$row[] = $person->mhs_jk;
			$row[] = $person->mhs_tm;
			$row[] = $person->mhs_ttl;
			$row[] = $person->mhs_asal;
			$row[] = $person->mhs_jurusan;
			$row[] = $person->mhs_agama;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary btn-bd-edit" href="javascript:void()" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
				  <a class="btn btn-sm btn-danger btn-bd-delete" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->person->count_all(),
						"recordsFiltered" => $this->person->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->person->get_by_id($id);
		$data->mhs_ttl = ($data->mhs_ttl == '0000-00-00') ? '' : $data->mhs_ttl; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'mhs_nim' => $this->input->post('mhs_nim'),
				'mhs_nama' => $this->input->post('mhs_nama'),
				'mhs_alamat' => $this->input->post('mhs_alamat'),
				'mhs_jk' => $this->input->post('mhs_jk'),
				'mhs_tm' => $this->input->post('mhs_tm'),
				'mhs_ttl' => $this->input->post('mhs_ttl'),
				'mhs_asal' => $this->input->post('mhs_asal'),
				'mhs_jurusan' => $this->input->post('mhs_jurusan'),
				'mhs_agama' => $this->input->post('mhs_agama'),	
			);
		$insert = $this->person->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'mhs_nim' => $this->input->post('mhs_nim'),
				'mhs_nama' => $this->input->post('mhs_nama'),
				'mhs_alamat' => $this->input->post('mhs_alamat'),
				'mhs_jk' => $this->input->post('mhs_jk'),
				'mhs_tm' => $this->input->post('mhs_tm'),
				'mhs_ttl' => $this->input->post('mhs_ttl'),
				'mhs_asal' => $this->input->post('mhs_asal'),
				'mhs_jurusan' => $this->input->post('mhs_jurusan'),
				'mhs_agama' => $this->input->post('mhs_agama'),
			);
		$this->person->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->person->delete_by_id($id);
		echo json_encode(array("status" => 'success', "jawaban_server" => 'terhapus'));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('mhs_nim') == '')
		{
			$data['inputerror'][] = 'mhs_nim';
			$data['error_string'][] = 'NIM Wajib Diisi!';
			$data['status'] = FALSE;
		}

		if($this->input->post('mhs_nama') == '')
		{
			$data['inputerror'][] = 'mhs_nama';
			$data['error_string'][] = 'Nama Wajib Diisi!';
			$data['status'] = FALSE;
		}

		if($this->input->post('mhs_alamat') == '')
		{
			$data['inputerror'][] = 'mhs_alamat';
			$data['error_string'][] = 'Alamat Wajib Diisi!';
			$data['status'] = FALSE;
		}

		if($this->input->post('mhs_jk') == '')
		{
			$data['inputerror'][] = 'mhs_jk';
			$data['error_string'][] = 'Pilih Jenis Kelamin';
			$data['status'] = FALSE;
		}

		if($this->input->post('mhs_tm') == '')
		{
			$data['inputerror'][] = 'mhs_tm';
			$data['error_string'][] = 'Tahun Masuk Wajib Diisi!';
			$data['status'] = FALSE;
		}

		if($this->input->post('mhs_ttl') == '')
		{
			$data['inputerror'][] = 'mhs_ttl';
			$data['error_string'][] = 'Tanggal Lahir Wajib Diisi!';
			$data['status'] = FALSE;
		}

		if($this->input->post('mhs_asal') == '')
		{
			$data['inputerror'][] = 'mhs_asal';
			$data['error_string'][] = 'Asal Sekolah Wajib Diisi!';
			$data['status'] = FALSE;
		}

		if($this->input->post('mhs_jurusan') == '')
		{
			$data['inputerror'][] = 'mhs_jurusan';
			$data['error_string'][] = 'Pilih Jurusan!';
			$data['status'] = FALSE;
		}

		if($this->input->post('mhs_agama') == '')
		{
			$data['inputerror'][] = 'mhs_agama';
			$data['error_string'][] = 'Pilih Agama!';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
