<?php

class Login_database_actors extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	// Insert registration data in database
	public function registration_insert_actors($data)
	{

		// Query to check whether email already exist or not
		$condition = "UEmail =" . "'" . $data['UEmail'] . "'";
		$this->db->select('*');
		$this->db->from('User');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {

			// Query to insert data in database
			$this->db->insert('User', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}

	
	// Read data using username and password
	public function login_actors($data)
	{

		$condition = "UEmail =" . "'" . $data['UEmail'] . "' AND " . "UPassword =" . "'" . $data['UPassword'] . "'";
		$this->db->select('*');
		$this->db->from('User');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}


	// Read data from database to show data in admin page
	public function read_user_information_actors($UEmail)
	{

		$condition = "UEmail =" . "'" . $UEmail . "'";
		$this->db->select('*');
		$this->db->from('User');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function getRoleActor($data)
	{
		$selection = "RID";
		$condition = "UID =" . "'" . $data->UID . "'";
		$this->db->select($selection);
		$this->db->from('User');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();;
	}	

	public function getActors($data)
	{
		$selection = "UName, " . "USurname";
		$condition = "UID =" . "'" . $data->UID . "'";
		$this->db->select($selection);
		$this->db->from('User');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();;
	}

	public function getActorsBasicInfo($UID)
	{
		$selection = "UName, " . "USurname";
		$this->db->where("UID", $UID);
		$this->db->select($selection);
		$this->db->from('User');;
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();;
	}

	
	public function getActorsIDPics($data)
	{
		$condition = "UID =" . "'" . $data . "'";
		$this->db->select('UID');
		$this->db->from('Portfolio_Pictures');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		return $query->result();
	}

	public function getActorsIDInfo($data)
	{
		$condition = "UID =" . "'" . $data . "'";
		$this->db->select('UID');
		$this->db->from('Additional_Information');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		return $query->result();
	}

	public function getActorsRID($data)
	{
		$condition = "RID =" . "'" . $data . "'";
		$this->db->select('RID');
		$this->db->from('User');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		return $query->result();
	}


	public function getActorsIDfromemail($data)
	{

		$condition = "UEmail =" . "'" . $data . "'";
		$this->db->select('UID');
		$this->db->from('User');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();;
	}

	public function insert_Pic($data)
	{

		$condition = "UEmail =" . "'" . $data['UID'] . "'";
		$this->db->select('UID');
		$this->db->from('User');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		$data['UID'] = $query->result()[0]->UID;

		return $this->db->insert('Portfolio_Pictures', $data);
	}

	public function delete_Pic($UID)
	{
		$this->db->where("UID", $UID);
		$this->db->delete("Portfolio_Pictures");
	}

	public function update_Pic($data, $UID)
	{
		$this->db->set($data);
		$this->db->where("UID", $UID);
		$this->db->update("Portfolio_Pictures");
	}

	public function get_Pics($UID = FALSE)
	{
		if ($UID === FALSE) {
			$query = $this->db->get('Portfolio_Pictures');
			if ($query->num_rows() > 0) {
				return $query->result();
			}
		}
		$query = $this->db->get_where('Portfolio_Pictures', array('UID' => $UID));
		return $query->row_array();

	}

	public function get_AllPics($UID)
	{
		$condition = "UID = " . "'" . $UID . "'";
		$this->db->select('*');
		$this->db->from('Portfolio_Pictures');
		$this->db->where($condition);
		$this->db->order_by("UID");
		$query = $this->db->get();

		return $query->result();
	}

	public function insert_Info($data)
	{

		$condition = "UEmail =" . "'" . $data['UID'] . "'";
		$this->db->select('UID');
		$this->db->from('User');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		$data['UID'] = $query->result()[0]->UID;

		return $this->db->insert('Additional_Information', $data);
	}

	public function delete_Info($UID)
	{
		$this->db->where("UID", $UID);
		$this->db->delete("Additional_Information");
	}

	public function update_Info($data, $UID)
	{
		$this->db->set($data);
		$this->db->where("UID", $UID);
		$this->db->update("Additional_Information");
	}

	public function get_Info($UID = FALSE)
	{
		if ($UID === FALSE) {
			$query = $this->db->get('Additional_Information');
			if ($query->num_rows() > 0) {
				return $query->result();
			}
		}
		$query = $this->db->get_where('Additional_Information', array('UID' => $UID));
		return $query->row_array();

	}

	public function get_AllInfo($UID)
	{
		$condition = "UID = " . "'" . $UID . "'";
		$this->db->select('*');
		$this->db->from('Additional_Information');
		$this->db->where($condition);
		$this->db->order_by("UID");
		$query = $this->db->get();

		return $query->result();
	}

}


