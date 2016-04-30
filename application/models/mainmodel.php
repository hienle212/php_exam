<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mainmodel extends CI_model {

		
		function __construct()
		{
			parent::__construct();
		}

		public function show_users($user_info)
		{
		$query = "SELECT name, email, users.id FROM users  WHERE email = ? AND password = ?";
		$values = array($user_info['email'], $user_info['password']);
		return $this->db->query($query, $values)->row_array();
	}
		
		public function adduser($user_info)
		{
			$query = "INSERT INTO users (name,email, password, confirm_password, birthday, created_at,updated_at)  VALUES (\"?\",\"?\",\"?\",\"?\",\"?\",NOW(),NOW())";
			$values = (array($user_info['name'], $user_info['email'],$user_info['password'], $user_info['confirm_password'],$user_info['birthday']));
			$this->db->query($query,$values);
			$query2 = "SELECT id, email, password, birthday  FROM users WHERE email = \"?\"";
			$values2 = array($user_info['email']);
			return $this->db->query($query2, $values2)->row_array();
		

	}
		public function display_tasks($id){
		$query = "select appointments.id as appointments_id, tasks, date, time, status, poster_id from appointments left join users on users.id = poster_id  where users.id = ? ";
			$values = [$id];
			return $this->db->query($query, $values)->result_array();

		}
		public function remove_schedule($appointmentid){
		$query = "delete from user_has_appointment where user_has_appointment.appointment_id = ?";
		$values = [$appointmentid];
		$this->db->query($query, $values);
	}
	 public function edit($post, $id)
  {
    $query = "UPDATE appointments SET tasks =?, status =?, date =?, time = ? WHERE poster_id=?";
    $values = [$post['tasks'],$post['status'],$post['date'], $post['time'], $id];
    return $this->db->query($query,$values);
  }
  
	// 		public function add_appointment($schedule_info)
	// {
	// $query = "INSERT INTO appointments (date, time, task, poster_id) VALUES (?, ?, ?,?,?)";
	// $values = array($schedule_info['date'], $schedule_info['time'], $schedule_info['task'] $schedule_info['poster_id']);
	// $this->db->query($query, $values);
	// }

}