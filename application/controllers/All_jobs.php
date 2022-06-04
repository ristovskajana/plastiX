<?php
defined('BASEPATH') or exit('No direct script access allowed');

class All_jobs extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');

		// Load session
		$this->load->library('session');
		$this->load->library('form_validation');

		// Load model
		//$this->load->model('star_rating_comment_model');
		$this->load->model('JobPosts_model');
		$this->load->model('login_database_actors');
		$this->load->model('login_database_actors');

	}

	public function index()
	{

		$data['logiran'] = isset($this->session->userdata['logged_in']);

		if (!isset($this->session->userdata['logged_in'])) {
			$data['message_display'] = 'Log In to view this page!';
			$this->load->view('templates/header', $data);
			$this->load->view('user_authentication_actors/login_form_actors', $data);
			$this->load->view('templates/footer');
			return;
		}
		$data['logiran'] = isset($this->session->userdata['logged_in']);
		$data['role'] = 1;
		// Fetch all records
		$Jobposts = $this->getAllJobPosts();
		$Requirements = $this->loadAllRequirements();
		$this->load->view('templates/header', $data);
		$this->load->view('features/allJobs', ['Jobposts' => $Jobposts, 'Requirements' => $Requirements]);
		$this->load->view('templates/footer');

	}

	public function display($data)
	{
		$data['logiran'] = isset($this->session->userdata['logged_in']);
		$data['role'] = 1;
		$this->load->view('templates/header', $data);
		$this->load->view('features/allJobs', ['data' => $data]);
		$this->load->view('templates/footer');
	}

	public function getAllJobPosts()
	{
		return $this->JobPosts_model->getAllPosts();
	}


	public function searchForJobs()
	{

		$user = $this->session->userdata['logged_in']['UEmail'];
		$UID = $this->login_database_employers->getEmployerIDfromemail($user)[0]->UID;

		$keyword = $this->input->post('text');

		$Jobposts= $this->JobPosts_model->searchJobs($keyword);

		$response = $this->display($data);

		echo $response;
	}

	public function loadAllRequirements(){
		$this->db->select('*');
		$this->db->from('Requirements');
		$this->db->order_by("QID");
		$query = $this->db->get();

		return $query->result();

	}

}
