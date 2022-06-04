<?php
class Pages extends CI_Controller {

	public function view($page)
	{
		$this->load->helper('url_helper');
		$this->load->library('session');

		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data["title"] = $page;
		$data['logiran'] = isset($this->session->userdata['logged_in']);
		$data['role'] = 3;
		$this->load->view('templates/header',$data);
		$this->load->view('pages/'. $page);
		$this->load->view('templates/footer');
	}

}
