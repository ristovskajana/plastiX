<?php

class Login_database_employers extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}


	public function registration_insert_employers($data)
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
	public function login_employers($data)
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

	public function read_user_information_employers($UEmail)
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


	public function getEmployers($data)
	{
		$selection = "UName, ";
		$condition = "UID =" . "'" . $data->UID . "'";
		$this->db->select($selection);
		$this->db->from('User');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();;
	}


	public function getEmployersID($data)
	{
		$condition = "UID =" . "'" . $data . "'";
		$this->db->select('UID');
		$this->db->from('Job');
		$this->db->where($condition);
		$query = $this->db->get();

		return $query->result();
	}

	public function getEmployersRID($data)
	{
		$condition = "RID =" . "'" . $data . "'";
		$this->db->select('RID');
		$this->db->from('User');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		return $query->result();
	}

	public function getEmployersBasicInfo($UID)
	{
		$selection = "UName, " ;
		$this->db->where("UID", $UID);
		$this->db->select($selection);
		$this->db->from('User');;
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();;
	}

	public function getJobBasicInfo($JID)
	{
		$selection = "JDesc" ;
		$this->db->where("JID", $JID);
		$this->db->select($selection);
		$this->db->from('Jobs');;
		$query = $this->db->get();
		return $query->result();;
	}

	public function getJobTitle($JID)
	{
		$selection = "JTitle" ;
		$this->db->where("JID", $JID);
		$this->db->select($selection);
		$this->db->from('Jobs');;
		$query = $this->db->get();
		return $query->result();;
	}

	public function getEmployersIDfromemail($data)
	{

		$condition = "UEmail =" . "'" . $data . "'";
		$this->db->select('UID');
		$this->db->from('User');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();;
	}

	public function insert_Job($data)
	{

		$condition = "UEmail =" . "'" . $data['UID'] . "'";
		$this->db->select('UID');
		$this->db->from('User');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		$data['UID'] = $query->result()[0]->UID;

		return $this->db->insert('Jobs', $data);
	}

	public function delete_Job($UID)
	{
		$this->db->where("UID", $UID);
		$this->db->delete("Jobs");
	}

	public function update_Job($data, $UID)
	{
		$this->db->set($data);
		$this->db->where("UID", $UID);
		$this->db->update("Jobs");
	}

	public function insert_Requirements($data)
	{

		$condition = "UEmail =" . "'" . $data['UID'] . "'";
		$this->db->select('UID');
		$this->db->from('User');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		$data['UID'] = $query->result()[0]->UID;

		return $this->db->insert('Requirements', $data);
	}

	public function delete_Requirements($JID)
	{
		$this->db->where("JID", $JID);
		$this->db->delete("Requirements");
	}

	public function update_Requirements($data, $JID)
	{
		$this->db->set($data);
		$this->db->where("JID", $JID);
		$this->db->update("Requirements");
	}

	public function get_AllJobs($UID)
	{
		$condition = "UID =" . "'" . $UID . "'";
		$this->db->select('*');
		$this->db->from('Jobs');
		$this->db->where($condition);
		$this->db->order_by("UID");
		$query = $this->db->get();

		return $query->result();
	}

	public function get_AllRequirements($JID)
	{
		$condition = "JID =" . "'" . $JID . "'";
		$this->db->select('*');
		$this->db->from('Requirements');
		$this->db->where($condition);
		$this->db->order_by("JID");
		$query = $this->db->get();

		return $query->result();
	}

	public function getJobByID($JID = FALSE)
	{
		if ($JID === FALSE) {
			$query = $this->db->get('Jobs');
			if ($query->num_rows() > 0) {
				return $query->result();
			}
		}
		$query = $this->db->get_where('Jobs', array('JID' => $JID));
		return $query->row_array();

	}

	public function getJobs($UID = FALSE)
	{
		if ($UID === FALSE) {
			$query = $this->db->get('Jobs');
			if ($query->num_rows() > 0) {
				return $query->result();
			}
		}
		$query = $this->db->get_where('Jobs', array('UID' => $UID));
		return $query->row_array();
	}

}


