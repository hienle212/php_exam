<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mainmodel');
		$this->load->library("form_validation");
	}
	public function index()
	{
		$this->load->view("welcome_page");
	}
		public function register(){
		$this->form_validation->set_rules("name", "Name", "trim|required|min_length[3]|xss_clean");
		$this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]|do_hash");
		$this->form_validation->set_rules("confirm_password", "Confirm Password", "trim|required|matches[password]");
   	 	$this->form_validation->set_rules('birthday', 'birthday');
		
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata("registration_errors", validation_errors());
			redirect('/');
		}
		else{
			$user_info = $this->input->post();
			$add_user = $this->mainmodel->adduser($user_info);
			if ($add_user){
				$this->session->set_userdata(['userinfo' => $add_user]);
				redirect("main/profile");

			}
			else{
				$this->session->set_flashdata("login_error", "Sorry but your info were not registered please try again");
				redirect(base_url('/'));
			}
		}
	}
	public function login(){

		$this->form_validation->set_rules("email", "email", "trim|valid_email|required");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]|do_hash");
		
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata("login_errors", validation_errors());
			redirect('/');
		}
		else
		{
			$user_info = $this->input->post();		
			$get_user = $this->mainmodel->show_users($user_info);
			if ($get_user)
			{
				$this->session->set_userdata(['userinfo' => $get_user]);
				redirect('/main/profile');				
			}
			else
			{
				$this->session->set_flashdata("login_errors", "Invalid email and/or password");
				redirect('/');
			}
		}
	}				
		public function profile(){
		$userinfo = $this->session->userdata('userinfo');
		$mydate = date("  j F Y ");
		$schedule= $this->mainmodel->display_tasks($userinfo['id']);
		// var_dump($schedule);
		// die();
		$this->load->view("appointments", array("date_on_page"=>$mydate, "schedule" => $schedule));

	 	}
	 	public function removeSchedule($appointmentid)
	{
		$this->mainmodel->remove_schedule($appointmentid);
		redirect('/main/profile');

	}
 
     public function update(){
     $userinfo = $this->session->userdata('userinfo');
    $post = $this->input->post();
    $this->mainmodel->edit($post, $userinfo['id']);
    $this->load->view('editpage');
	}

	 public function logout(){
   	 	$this->session->sess_destroy();
    	redirect('/');
    }
}
