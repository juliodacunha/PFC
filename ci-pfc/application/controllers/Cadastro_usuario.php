<?php

class Cadastro_usuario extends CI_Controller
{
    public function __construct(){
        parent:: __construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('cadastro_usuario');
        $this->load->view('footer');
    }

    public function cadastrar(){
        $data['tipuser_tip_user '] = $this->input->post('tipuser_tip_user ');
        $data['cpf'] = $this->input->post('cpf');
        $data['rg'] = $this->input->post('rg');
        $data['email'] = $this->input->post('email');
        $data['sexo'] = $this->input->post('sexo');
        $data['nome'] = $this->input->post('nome');
        $data['sobrenome'] = $this->input->post('sobrenome');
        $data['senha'] = md5($this->input->post('senha'));

        if($this->db->insert('usuarios',$data)){
            redirect('Cadastro_usuario');
        }
    }
}