<?php

class Profile_employers extends CI_Controller
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

	public function index_employers()
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

		$Jobs = $this->getAllJobsOfEmployer();
		$this->load->view('templates/header', $data);
		$this->load->view('features/profileEmployers', ['Jobs' => $Jobs]);
		$this->load->view('templates/footer');
	}

	public function upload_job()
	{

		$this->form_validation->set_rules('JTitle', 'JTitle', 'required');
		$this->form_validation->set_rules('JDesc', 'JDesc', 'required');
		$this->form_validation->set_rules('JLocation', 'JLocation', 'required');
		$this->form_validation->set_rules('JDeadline', 'JDeadline', 'required');
		$this->form_validation->set_rules('JPhone', 'JPhone', 'required');
		$this->form_validation->set_rules('JEmail', 'JEmail', 'required');

		if ($this->form_validation->run() === FALSE) {

			$this->index_employers();

		} else {

			$user = $this->session->userdata['logged_in']['EEmail'];
			$EID = $this->login_database_employers->getEmployersIDfromemail($user)[0]->EID;

			$data = array(
				'JTitle' => $this->input->post('JTitle'),
				'JDesc' => $this->input->post('JDesc'),
				'JLocation' => $this->input->post('JLocation'),
				'JDeadline' => $this->input->post('JDeadline'),
				'JPhone' => $this->input->post('JPhone'),
				'JEmail' => $this->input->post('JEmail'),
			);

			
				$data['EID'] = $this->session->userdata['logged_in']['EEmail'];
				unset($data['submit']);

				if ($this->login_database_employers->insert_Job($data)) {
					$this->index_employers();
				}
			
		}

	}

	public function add_requirements($JID){

		$this->form_validation->set_rules('QType', 'QType', 'trim|required');
		$this->form_validation->set_rules('QRequirement	', 'QRequirement', 'trim|required');

		if ($this->form_validation->run() === FALSE) {

			$this->index_employers();

		} else {

			$user = $this->session->userdata['logged_in']['EEmail'];
			$EID = $this->login_database_employers->getActorsIDfromemail($user)[0]->EID;

			$data = array(
				'QType' => $this->input->post('QType'),
				'QRequirement' => $this->input->post('QRequirement'),
			);

			
				$data['JID'] = $JID;
				unset($data['submit']);

				if ($this->login_database_employers->insert_Requirements($data)) {
					$this->index_employers();
				}
			
		}
	}

	public function getAllJobsOfEmployer()
	{

		$user = $this->session->userdata['logged_in']['EEmail'];
		$EID = $this->login_database_employers->getEmployersIDfromemail($user)[0]->EID;

		return $this->login_database_employers->get_AllJobs($EID);

	}

	public function deleteJob($JID)
	{

		$path = $this->login_database_employers->findLocation($JID)[0]->location;

		$u = $this->session->userdata['logged_in']['EEmail'];
		$check = $this->login_database_employers->getEmployersIDfromemail($u)[0]->EID;
		$check2 = $this->login_database_employers->getEmployersID($JID)[0]->EID;

		if ($check === $check2) {
			unlink($path);
			$this->login_database_employers->deleteJob($JID);
			$this->index();
		} else {
			echo "You don't have permission to delete this item!";
		}

	}

	public function editJob($id)
	{

		$data['logiran'] = isset($this->session->userdata['logged_in']);
		$data['role'] = 2;

		if (!isset($this->session->userdata['logged_in'])) {
			$data['message_display'] = 'Signin to view this page!';
			$data['role'] = 3;
			$this->load->view('templates/header', $data);
			$this->load->view('user_authentication/login_form_employers', $data);
			$this->load->view('templates/footer');
			return;
		}

		$data['logiran'] = isset($this->session->userdata['logged_in']);

		$u = $this->session->userdata['logged_in']['EEmail'];
		$check = $this->login_database_employers->getEmployersIDfromemail($u)[0]->EID;
		$check2 = $this->login_database_employers->getEmployersID($JID)[0]->EID;

		if ($check === $check2) {

			$data['JTitle'] = 'Update video post';

			$this->form_validation->set_rules('JTitle', 'JTitle', 'required');
			$this->form_validation->set_rules('JDesc', 'JDesc', 'required');
			$this->form_validation->set_rules('JLocation', 'JLocation', 'required');
			$this->form_validation->set_rules('JDeadline', 'JDeadline', 'required');
			$this->form_validation->set_rules('JPhone', 'JPhone', 'required');
			$this->form_validation->set_rules('JEmail', 'JEmail', 'required');

			if ($this->form_validation->run() === FALSE) {
				$Job = $this->login_database_employers->getJob($EID);

				$this->load->view('templates/header', $data);
				$this->load->view('features/profileEmployers', ['Job' => $Job]);
				$this->load->view('templates/footer');

			} else {
				$new["JTitle"] = $this->input->post("JTitle");
				$new["JDesc"] = $this->input->post("JDesc");
				$new["JLocation"] = $this->input->post("JLocation");
				$new["JDeadline"] = $this->input->post("JDeadline");
				$new["JPhone"] = $this->input->post("JPhone");
				$new["JEmail"] = $this->input->post("JEmail");
				$this->login_database_employers->update_Job($new, $EID);
				$this->index();
			}
		} else {

			echo "You dont have permission to edit this video!";
		}
	}


}
