<?php
	class User extends CI_Model
	{
		function get_user($email)
		{
			$query = "SELECT * FROM users WHERE email = ? AND password = ?";
			$values = array($email['email'], $email['password']);
			return $this->db->query($query, $values)->row_array();
		}

		function check_user_email($email)
		{
			$query = "SELECT * FROM users WHERE email = ?";
			$values = $email;
			return $this->db->query($query, $values)->row_array();
		}

		function add_user($user_info)
		{
			//check if user email already exists
			$check_user_email = $this->check_user_email($user_info['email']);
			$email_exists = "Email already exists";

			if($check_user_email){
				return FALSE;
			}
			else{
				$query = "INSERT INTO users (first_name, last_name, email, password, created_at) VALUES (?,?,?,?,?)";
				$values = array($user_info['first_name'], $user_info['last_name'], $user_info['email'], $user_info['password'], date("Y-m-d, H:i:s"));
				
				return $this->db->query($query, $values);
			}
		}
	}
?>