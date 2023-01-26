<?php

class User_authentication_employers extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url_helper');

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('login_database_employers');


	}

	// Show login employers page
	public function index_employers()
	{
		$data['logiran'] = isset($this->session->userdata['logged_in']);
		$data['role'] = 2;
		$this->load->view('templates/header', $data);
		$this->load->view('user_authentication/login_form_employers');
		$this->load->view('templates/footer');
	}


	public function show_employers()
	{
		$data['logiran'] = isset($this->session->userdata['logged_in']);
		$data['role'] = 2;
		$this->load->view('templates/header', $data);
		$this->load->view('user_authentication/registration_form_employers');
		$this->load->view('templates/footer');
	}


	// Validate and store registration data in database
	public function signup_employers()
	{
		$data['logiran'] = isset($this->session->userdata['logged_in']);

		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('EName', 'EName', 'trim|required');
		$this->form_validation->set_rules('EEmail_value', 'EEmail', 'trim|required');
		$this->form_validation->set_rules('EPassword', 'EPassword', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['logiran'] = isset($this->session->userdata['logged_in']);
			$data['role'] = 3;
			$this->load->view('templates/header',$data);
			$this->load->view('user_authentication/registration_form_employers');
			$this->load->view('templates/footer');
		} else {
			$data = array(
				'RID' => $this->input->post('RID'),
				'EName' => $this->input->post('EName'),
				'EEmail' => $this->input->post('EEmail_value'),
				'EPassword' => $this->input->post('EPassword')
			);
			$result = $this->login_database_employers->registration_insert_employers($data);
			if ($result == TRUE) {
				$data['logiran'] = isset($this->session->userdata['logged_in']);
				$data['role'] = 3;
				$data['message_display'] = 'Registration Successfully !';
				$this->load->view('templates/header',$data);
				$this->load->view('user_authentication/login_form_employers', $data);
				$this->load->view('templates/footer');
			} else {
				$data['logiran'] = isset($this->session->userdata['logged_in']);
				$data['message_display'] = 'Email already in system!';
				$data['role'] = 3;
				$this->load->view('templates/header',$data);
				$this->load->view('user_authentication/registration_form_employers');
				$this->load->view('templates/footer');
			}
		}
	}


	// Check for user login process
	public function signin_employers()
	{

		$data['logiran'] = isset($this->session->userdata['logged_in']);
		$this->form_validation->set_rules('EEmail', 'EEmail', 'trim|required');
		$this->form_validation->set_rules('EPassword', 'EPassword', 'trim|required');

		$data = array(
			'EEmail' => $this->input->post('EEmail'),
			'EPassword' => $this->input->post('EPassword')
		);
		$result = $this->login_database_employers->login_employers($data);
		if ($result == TRUE) {

			$EEmail = $this->input->post('EEmail');
			$result = $this->login_database_employers->read_user_information_employers($EEmail);
			if ($result != false) {
				$session_data = array(
					'EName' => $result[0]->EName,
					'EEmail' => $result[0]->EEmail,
				);
				// Add user data in session
				$data = array('error_message' => 'Signin OK');
				$this->session->set_userdata('logged_in', $session_data);
				$data['logiran'] = isset($this->session->userdata['logged_in']);
				$data['role'] = 2;
				$pass['EName'] = $result[0]->EName;
				$this->load->view('templates/header', $data);
				$this->load->view('user_authentication/welcome_user_employers', ['pass' => $pass]);
				$this->load->view('templates/footer');
			}
		} else {
			$data = array(
				'error_message' => 'Invalid Username or Password'
			);
			$data['logiran'] = isset($this->session->userdata['logged_in']);
			$data['role'] = 3;
			$this->load->view('templates/header', $data);
			$this->load->view('user_authentication/login_form_employers', $data);
			$this->load->view('templates/footer');
		}
	}


	public function logout_employers()
	{
		$data['logiran'] = isset($this->session->userdata['logged_in']);
		// Removing session data
		$sess_array = array(
			'EName' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['logiran'] = isset($this->session->userdata['logged_in']);
		$data['role'] = 3;
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('templates/header', $data);
		$this->load->view('user_authentication/login_form_employers', $data);
		$this->load->view('templates/footer');
	}

}
