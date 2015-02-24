<?php
	class Users extends CI_Controller
	{
		function index()
		{
			if($this->session->flashdata('notice') !== NULL){
				$notice['results'] = $this->session->flashdata('notice');
			}
			else{
				$notice['results'] = '';
			}
			
			$this->load->view('login_registration.php', $notice);
		}

		function login()
		{
			//validate post data
			$this->load->library("form_validation");
			$this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
			$this->form_validation->set_rules("password", "Password", "trim|min_length[8]|required");
	
			if($this->form_validation->run() === FALSE)
			{
			    //$this->view_data["errors"] = validation_errors();
				$this->session->set_flashdata('notice', validation_errors());
				redirect(base_url('/'));
			}
			else
			{
				$this->load->model("User");
							
				$user_display = $this->User->get_user(array(
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
				));
				
				if(!$user_display)
				{
					$this->session->set_flashdata('notice', 'Login failed!');
					redirect(base_url('/'));
				}
				else{
					$this->session->set_userdata(array(
						'email' => $user_display['email'],
						'logged_in' => TRUE,
						'first_name' => $user_display['first_name'],
						'last_name' => $user_display['last_name']
					));

					redirect(base_url('/welcome'));
				}
			}
		}

		function register()
		{
			//validate post data
			if($this->input->post('action') == "register")
			{
				$this->load->library("form_validation");
				$this->form_validation->set_rules("first_name", "First Name", "trim|required");
				$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
				$this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
				$this->form_validation->set_rules("password", "Password", "trim|min_length[8]|matches[confirm_password]|required");
				$this->form_validation->set_rules("confirm_password", "Confirm Password", "trim|min_length[8]|required");

				if($this->form_validation->run() === FALSE)
				{
					$this->session->set_flashdata('notice', validation_errors());
					redirect(base_url('/'));
				}
				else{
					//load register query
					$this->load->model("User");
					
					//call register query
					$add_user = $this->User->add_user(array(
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'email' => $this->input->post('email'),
						'password' => $this->input->post('password')
						));

					//if query returns false
					if($add_user === FALSE){
						//redirect to index page with error
						$this->session->set_flashdata('notice', 'Email already exists!');
						redirect(base_url('/'));
					}
					else{
						//return to welcome page
						$this->session->set_userdata(array(
							'email' => $add_user['email'],
							'logged_in' => TRUE,
							'first_name' => $add_user['first_name'],
							'last_name' => $add_user['last_name']
							));
						redirect(base_url('/welcome'));
					}
				}
			}
			else{
				//return to index page with error
				$this->session->set_flashdata('notice', 'You cannot access these pages directly');
				redirect(base_url('/'));
			}
		}

		function welcome()
		{
			if($this->session->userdata('logged_in') === TRUE){
				$session_data['email'] = $this->session->userdata('email');
				$session_data['first_name'] = $this->session->userdata('first_name');
				$session_data['last_name'] = $this->session->userdata('last_name');
				$this->load->view('welcome', $session_data);
			}
		}

		function signout()
		{
			$this->session->sess_destroy();
			$this->session->set_flashdata('notice', 'You have been logged out!');
			redirect(base_url('/'));
		}
	}
?>