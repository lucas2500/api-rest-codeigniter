<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_model extends CI_model {


	public function getFuncionario(){

		$this->db->order_by('ID', 'DESC');

		$query = $this->db->get('usuarios');

		return $query->result();

	}

	public function insertFunc($dados=NULL){

		if($dados != NULL):

			$this->db->insert('usuarios', $dados);
		endif;

	}

}


