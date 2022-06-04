<?php
defined('BASEPATH') or exit('No direct script access allowed');

class All_actors extends CI_Controller
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
		$this->load->model('login_database_employers');
		$this->load->model('login_database_actors');

	}

	public function index()
	{

		$data['logiran'] = isset($this->session->userdata['logged_in']);

		if (!isset($this->session->userdata['logged_in'])) {
			$data['message_display'] = 'Log In to view this page!';
			$data['role'] = 3;
			$this->load->view('templates/header', $data);
			$this->load->view('user_authentication_employers/login_form_employers', $data);
			$this->load->view('templates/footer');
			return;
		}
		$data['logiran'] = isset($this->session->userdata['logged_in']);
		$data['role'] = 2;
		// Fetch all records
		$Actors = $this->getAllActors();
		$Pictures = $this->loadAllPictures();
		$this->load->view('templates/header', $data);
		$this->load->view('features/allActors', ['Pictures' => $Pictures, 'Actors' => $Actors]);
		$this->load->view('templates/footer');

	}

	public function display($data)
	{
		$data['logiran'] = isset($this->session->userdata['logged_in']);
		$data['role'] = 2;
		$this->load->view('templates/header', $data);
		$this->load->view('features/allActors', ['data' => $data]);
		$this->load->view('templates/footer');
	}

	public function getAllActors()
	{
		return $this->JobPosts_model->getAllActorsInfo();
	}

	public function loadAllPictures()
	{
		$this->db->select('*');
		$this->db->from('Portfolio_Pictures');
		$this->db->order_by("UID");
		$query = $this->db->get();

		return $query->result();
	}


	public function searchForActors()
	{

		$user = $this->session->userdata['logged_in']['UEmail'];
		$UID = $this->login_database_employers->getEmployerIDfromemail($user)[0]->UID;

		$keyword = $this->input->post('text');

		$Actors = $this->JobPosts_model->searchActors($keyword);

		$response = $this->display($data);

		echo $response;
	}

}
