<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('rest_model','rest');
		
	}

	public function index(){

        if($this->input->get_request_header('API-KEY', TRUE)=="dgdtyfvvmth674gjrddjghdktudn64fdhd"){

            $data = $this->rest->getFuncionario();

            if($data != NULL){

                echo json_encode($data);

            } else{

                echo "Nenhum dado encontrado";
            }

        } else{

            echo "Erro ao validar o token";
        }

    }

    public function insertDados(){

        if($this->input->get_request_header('API-KEY', TRUE)=="dgdtyfvvmth674gjrddjghdktudn64fdhd"){

            $data['nome'] = $this->input->post('nome');
            $data['idade'] = $this->input->post('idade');
            $data['cargo'] = $this->input->post('cargo');

            $this->rest->insertFunc($data);

        } else{

            echo "Erro ao validar o token";
        }

    }

    public function editarDados(){

        if($this->input->get_request_header('API-KEY', TRUE)=="dgdtyfvvmth674gjrddjghdktudn64fdhd"){

            $query = $this->rest->getFuncById($this->input->post('ID'));

            echo json_encode($query);

        } else{

            echo "Erro ao validar o token";
        }

    }

    public function atualizarDados(){

        if($this->input->get_request_header('API-KEY', TRUE)=="dgdtyfvvmth674gjrddjghdktudn64fdhd"){

            $data['nome'] = $this->input->post('nome');
            $data['idade'] = $this->input->post('idade');
            $data['cargo'] = $this->input->post('cargo');

            $this->rest->editReg($data, $this->input->post('ID'));

        } else{

            echo "Erro ao validar o token";
        }

    }


    public function deletarDados(){

        if($this->input->get_request_header('API-KEY', TRUE)=="dgdtyfvvmth674gjrddjghdktudn64fdhd"){

            $this->rest->deleteFunc($this->input->post('ID'));


        } else{

            echo "Erro ao validar o token";

        }

    }

}


