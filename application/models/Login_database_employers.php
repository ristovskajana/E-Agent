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
		$condition = "EEmail =" . "'" . $data['EEmail'] . "'";
		$this->db->select('*');
		$this->db->from('Employer');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {

			// Query to insert data in database
			$this->db->insert('Employer', $data);
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

		$condition = "EEmail =" . "'" . $data['EEmail'] . "' AND " . "EPassword =" . "'" . $data['EPassword'] . "'";
		$this->db->select('*');
		$this->db->from('Employer');
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
		$condition = "EID =" . "'" . $data->EID . "'";
		$this->db->select($selection);
		$this->db->from('Employer');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();;
	}	

	public function read_user_information_employers($EEmail)
	{

		$condition = "EEmail =" . "'" . $EEmail . "'";
		$this->db->select('*');
		$this->db->from('Employer');
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
		$selection = "EName, ";
		$condition = "EID =" . "'" . $data->EID . "'";
		$this->db->select($selection);
		$this->db->from('Employer');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();;
	}


	public function getEmployersID($data)
	{
		$condition = "EID =" . "'" . $data . "'";
		$this->db->select('EID');
		$this->db->from('Job');
		$this->db->where($condition);
		$query = $this->db->get();

		return $query->result();
	}

	public function getEmployersRID($data)
	{
		$condition = "RID =" . "'" . $data . "'";
		$this->db->select('RID');
		$this->db->from('Employer');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		return $query->result();
	}

	public function getEmployersBasicInfo($EID)
	{
		$selection = "EName, " ;
		$this->db->where("EID", $EID);
		$this->db->select($selection);
		$this->db->from('Employer');;
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();;
	}

	public function getJobBasicInfo($JID)
	{
		$selection = "JDesc, JLocation, JDeadline" ;
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

		$condition = "EEmail =" . "'" . $data . "'";
		$this->db->select('EID');
		$this->db->from('Employer');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();;
	}

	public function insert_Job($data)
	{

		$condition = "EEmail =" . "'" . $data['EID'] . "'";
		$this->db->select('EID');
		$this->db->from('Employer');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		$data['EID'] = $query->result()[0]->EID;

		return $this->db->insert('Jobs', $data);
	}

	public function delete_Job($EID)
	{
		$this->db->where("EID", $EID);
		$this->db->delete("Jobs");
	}

	public function update_Job($data, $EID)
	{
		$this->db->set($data);
		$this->db->where("EID", $EID);
		$this->db->update("Jobs");
	}

	public function insert_Requirements($data)
	{

		$condition = "EEmail =" . "'" . $data['EID'] . "'";
		$this->db->select('EID');
		$this->db->from('Employer');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		$data['EID'] = $query->result()[0]->EID;

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

	public function get_AllJobs($EID)
	{
		$condition = "EID =" . "'" . $EID . "'";
		$this->db->select('*');
		$this->db->from('Jobs');
		$this->db->where($condition);
		$this->db->order_by("EID");
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

	public function getJobs($EID = FALSE)
	{
		if ($EID === FALSE) {
			$query = $this->db->get('Jobs');
			if ($query->num_rows() > 0) {
				return $query->result();
			}
		}
		$query = $this->db->get_where('Jobs', array('EID' => $EID));
		return $query->row_array();
	}

}


