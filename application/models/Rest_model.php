<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_model extends CI_model {


	public function getFuncionario(){

		$this->db->order_by('ID', 'DESC');

		$query = $this->db->get('usuarios');

		return $query->result();

	}

	public function getFuncById($ID=NULL){

		if($ID != NULL):

			$this->db->where('ID', $ID);
			$query = $this->db->get('usuarios');

			return $query->row();
		endif;

	}

	public function insertFunc($dados=NULL){

		if($dados != NULL):

			$this->db->insert('usuarios', $dados);
		endif;

	}

	public function editReg($dados=NULL, $ID=NULL){

		if($dados != NULL && $ID != NULL):

			$this->db->where('ID', $ID);
			$this->db->update('usuarios', $dados);
		endif;
	}


	public function deleteFunc($ID=NULL){

		if($ID != NULL):

			$this->db->where('ID', $ID);
			$this->db->delete('usuarios');
		endif;
	}

}


