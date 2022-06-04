<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class JobPosts_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	// Fetch records
	public function getAllPosts()
	{
		$this->db->select('*');
		$this->db->from('Jobs');
		$this->db->order_by("JID");
		$query = $this->db->get();

		return $query->result();
	}

	public function getAllActorsInfo()
	{
		$this->db->select('*');
		$this->db->from('User');
		$this->db->order_by("UID");
		$query = $this->db->get();

		return $query->result();
	}


	public function searchJobs($keyword)
	{
		$condition = "JDesc like '%" . $keyword . "%' or JLocation like '%" . $keyword . "%' or JTitle like '%" . $keyword . "%' ";
		$this->db->select('*');
		$this->db->from('Jobs');
		$this->db->where($condition);
		$query = $this->db->get();

		return $query->result();
	}

	public function searchActors($keyword)
	{
		$condition = "UName like '%" . $keyword . "%' or USurname like '%" . $keyword . "%' ";
		$this->db->select('*');
		$this->db->from('User');
		$this->db->where($condition);
		$query = $this->db->get();

		return $query->result();
	}
	
}
