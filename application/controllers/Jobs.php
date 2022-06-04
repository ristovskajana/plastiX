<?php

class Jobs extends CI_Controller
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
		$this->load->model('login_database_employers');
	}

	public function show_job($JID)
	{
		$data['logiran'] = isset($this->session->userdata['logged_in']);
		$data['role'] = 2;
		
		if (!isset($this->session->userdata['logged_in'])) {
			$data['message_display'] = 'Log in to view this page!';
			$data['role'] = 3;
			$this->load->view('templates/header', $data);
			$this->load->view('user_authentication/login_form_employers', $data);
			$this->load->view('templates/footer');
			return;
		}
		$data['logiran'] = isset($this->session->userdata['logged_in']);

		$job = $this->login_database_employers->getJobByID($JID);
		$Requirements = $this->getAllRequirements($JID);
		$this->session->set_userdata('JID', $JID);
		$this->load->view('templates/header', $data);
		$this->load->view('features/job', ['Requirements' => $Requirements, 'job' => $job]);
		$this->load->view('templates/footer');
	}


	public function add_requirements(){

		$this->form_validation->set_rules('QRequirement	', 'QRequirement', 'trim|required');

		$user = $this->session->userdata['logged_in']['UEmail'];
		$UID = $this->login_database_employers->getEmployersIDfromemail($user)[0]->UID;
		$JID = $this->session->userdata['JID'];
		$data = array(
			'QRequirement' => $this->input->post('QRequirement'),
		);

		$data['UID'] = $this->session->userdata['logged_in']['UEmail'];
		$data['JID'] = $this->session->userdata['JID'];
		unset($data['submit']);

		if ($this->login_database_employers->insert_Requirements($data)) {
			$this->show_job($JID);
		}

		
	}

	public function getAllRequirements($JID)
	{
		$user = $this->session->userdata['logged_in']['UEmail'];
		$UID = $this->login_database_employers->getEmployersIDfromemail($user)[0]->UID;

		return $this->login_database_employers->get_AllRequirements($JID);
	}
}
