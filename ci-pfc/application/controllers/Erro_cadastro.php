<?php

class Erro_cadastro extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('erro_cadastro');
        $this->load->view('footer');
    }

    public function redirect(){
        $this->session->set_flashdata('message_id', 'Message');//message rendered
        $this->session->set_flashdata('seconds_redirect', 5);//time to be redirected (in seconds)
        $this->session->set_flashdata('Cadastro_usuario', base_url('Cadastro_usuario/index'));//url to be redirected
    
        redirect(view('erro_cadastro'), 'refresh');
    }
}
?>