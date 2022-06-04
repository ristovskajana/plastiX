<?php

class Profile_actors extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();

		$this->load->helper('url_helper');

		// Load form helper library
		$this->load->helper('form');

		$this->load->helper('file');

		// Load form validation library
		$this->load->library('form_validation');
		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('login_database_actors');
	}

	public function index_actors()
	{

		$data['logiran'] = isset($this->session->userdata['logged_in']);
		$data['role'] = 1;
		
		if (!isset($this->session->userdata['logged_in'])) {
			$data['message_display'] = 'Log in to view this page!';
			$data['role'] = 3;
			$this->load->view('templates/header', $data);
			$this->load->view('user_authentication/login_form_actors', $data);
			$this->load->view('templates/footer');
			return;
		}
		$data['logiran'] = isset($this->session->userdata['logged_in']);

		$Additional_Information = $this->getAllInfoOfActor();
		$Portfolio_Pictures = $this->getAllPicturesOfActor();
		$this->load->view('templates/header', $data);
		$this->load->view('features/profileActors', ['Additional_Information' => $Additional_Information,  
			'Portfolio_Pictures' => $Portfolio_Pictures]);
		$this->load->view('templates/footer');
	}

	public function upload_portfolio_pictures()
	{
		if ($this->form_validation->run() === FALSE) {

			$this->index_actors();

		} else {

			$config = array(
				'upload_path' => './uploads',
				'allowed_types' => "gif|jpg|png|jpeg",
			);

			$this->load->library('upload', $config);

			$this->form_validation->set_error_delimiters();

			if ($this->upload->do_upload('filename')) {
				$data = $this->input->post();
				$info = $this->upload->data();

				$pic_path = "./uploads/" . $info['raw_name'] . $info['file_ext'];

				$data['PLocation'] = $pic_path;
				$data['UID'] = $this->session->userdata['logged_in']['UEmail'];
				unset($data['submit']);

				if ($this->login_database_actors->insert_Pic($data)) {
					$this->index_actors();
				} 

			}	
		}

		
		
	}


	public function upload_additional_information()
	{


		$this->form_validation->set_rules('IType', 'IType', 'trim|required');
		$this->form_validation->set_rules('IInformation', 'IInformation', 'trim|required');

		if ($this->form_validation->run() === FALSE) {

			$this->index_actors();

		} else {

			$user = $this->session->userdata['logged_in']['UEmail'];
			$UID = $this->login_database_actors->getActorsIDfromemail($user)[0]->UID;

			$data = array(
				'IType' => $this->input->post('IType'),
				'IInformation' => $this->input->post('IInformation'),
			);

			
			$data['UID'] = $this->session->userdata['logged_in']['UEmail'];
			unset($data['submit']);

			if ($this->login_database_actors->insert_Info($data)) {
				$this->index_actors();
			}
			
		}

	}

	public function find_actors($data)
	{
		return $this->login_database_actors->getUser($data);
	}

	public function getAllPicturesOfActor()
	{


		$user = $this->session->userdata['logged_in']['UEmail'];
		$UID = $this->login_database_actors->getActorsIDfromemail($user)[0]->UID;

		return $this->login_database_actors->get_AllPics($UID);

	}

	public function getAllInfoOfActor()
	{

		$user = $this->session->userdata['logged_in']['UEmail'];
		$UID = $this->login_database_actors->getActorsIDfromemail($user)[0]->UID;

		return $this->login_database_actors->get_AllInfo($UID);

	}

	public function deletePic($PID)
	{

		$path = $this->login_database_actors->findLocation($PID)[0]->location;

		$user = $this->session->userdata['logged_in']['UEmail'];
		$check =  $this->login_database_actors->getActorsIDfromemail($user)[0]->UID;
		$check2 = $this->login_database_actors->getActorsIDInfo($PID)[0]->UID;

		if ($check === $check2) {
			unlink($path);
			$this->login_database_actors->delete_Pic($PID);
			$this->index();
		} else {
			echo "You don't have permission to delete this item!";
		}

	}

	public function deleteInfo($PID)
	{

		$path = $this->login_database_actors->findLocation($IID)[0]->location;

		$user = $this->session->userdata['logged_in']['UEmail'];
		$check =  $this->login_database_actors->getActorsIDfromemail($user)[0]->UID;
		$check2 = $this->login_database_actors->getActorsIDInfo($IID)[0]->UID;

		if ($check === $check2) {
			unlink($path);
			$this->login_database_actors->delete_Info($PID);
			$this->index();
		} else {
			echo "You don't have permission to delete this item!";
		}

	}


}
