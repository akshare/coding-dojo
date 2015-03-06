<?php

	Class note extends CI_Model
	{
		//get all notes
		function display_all()
		{
			$query = "SELECT id, notes, description FROM notes";
			$result = $this->db->query($query)->result_array();
			
			return $result;
		}

		function display_note($note_id)
		{
			$query = "SELECT id, notes, description FROM notes WHERE id = ?";
			$value = $note_id;
			$result = $this->db->query($query, $value)->row_array();
			
			return $result;
		}

		function add($notes)
		{

			$query = "INSERT INTO notes (notes, description, created_at) values (?, ?, ?)";
			$notes_data = array($notes['note'],$notes['description'],date("Y-m-d, H:i:s"));
			$this->db->query($query, $notes_data);

			$this->session->set_flashdata('notice', 'Note has been added!');

			$result = $this->display_note($this->db->insert_id());

			return $result;
		}

		function edit($edit_values)
		{
			$query = "UPDATE notes SET description = ? WHERE id = ?";
			$values = array($edit_values['description'], $edit_values['id']);
			$result = $this->db->query($query,$values);

			$this->session->set_flashdata('notice', 'Note '. $edit_values['id'] .' has been updated!');

			return $result;
		}

		function delete($id)
		{
			$query = "DELETE FROM notes WHERE id = ?";
			$value = $id;
			$result = $this->db->query($query,$value);

			$this->session->set_flashdata('notice', 'Note '. $id .' has been deleted!');
			
			return $result;
		}
	}

?>