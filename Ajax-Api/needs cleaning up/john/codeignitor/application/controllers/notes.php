<?php

	class notes extends CI_Controller
	{
		function index()
		{
			//set the notice for users action results
			if($this->session->flashdata('notice')){
				$display_notes['notice'] = $this->session->flashdata('notice');
			}
			else{
				$display_notes['notice'] = NULL;
			}

			//load model note and call display_notes()
			$this->load->model('note');
			$display_notes['notes'] = $this->note->display_all();

			//display the results of notes table
			$this->load->view('notes', $display_notes);
		}

		public function get_all_notes()
		{	
			$this->load->model('note');
			$notes = $this->note->display_all();
			
			$note_block = array();

			foreach($notes as $note)
			{
				$note_id = $note['id'];

				$note = '<form id="form_edit_note" action="notes/edit" method="post">
							<textarea class="update" name="description">'. $note['description'] .'</textarea>
							<input type="hidden" value="'. $note_id .'" name="id">
							<input class="update" type="submit" value="Update">
						</form>';
							
				$note_block[] = '<div id="id_'. $note_id .'" class="notes_box">
									<div class="delete">
										<form id="form_delete_note" action="notes/delete" method="post">
											<input type="hidden" value="'. $note_id .'" name="id">
											<input type="hidden" value="delete" name="action">
											<input class="delete" type="submit" value="Delete">
										</form>
									</div>'. $note . 
								'</div>';
			}

			echo json_encode($note_block);
		}


		function add()
		{
			$this->load->model('note');
			$add_notes = $this->note->add($this->input->post(NULL, TRUE));
			
			//redirect(base_url('/'));

			$data['note'] = $add_notes['notes'];
			$data['note_description'] = $add_notes['description'];
			$data['note_id'] = $add_notes['id'];

			echo json_encode($data);
		}

		function edit()
		{
			$this->load->model('note');
			$edit_notes = $this->note->edit($this->input->post(NULL, TRUE));
			
			//redirect(base_url('/'));
		
			get_all_notes();
		}

		function delete()
		{
			$this->load->model('note');
			$delete_notes = $this->note->delete($this->input->post('id'));

			//redirect(base_url('/'));

			$data['note_id'] = $this->input->post('id');

			echo json_encode($data);
		}
	}

?>