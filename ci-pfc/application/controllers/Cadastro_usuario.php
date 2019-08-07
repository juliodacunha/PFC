<?php

class Cadastro_usuario extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('cadastro_usuario');
        $this->load->view('footer');
    }

//    public function cadastrar(){
//        $data['tipuser_tip_user '] = $this->input->post('tipuser_tip_user ');
//        $data['cpf'] = $this->input->post('cpf');
//        $data['rg'] = $this->input->post('rg');
//        $data['email'] = $this->input->post('email');
//        $data['sexo'] = $this->input->post('sexo');
//        $data['nome'] = $this->input->post('nome');
//        $data['sobrenome'] = $this->input->post('sobrenome');
//        $data['senha'] = md5($this->input->post('senha'));
//
//        if($this->db->insert('usuarios',$data)){
//            redirect('Cadastro_usuario');
//        }
//    }



    public function cadastrarUsuario()
    {
        $this->load->model('Cadastro_model', 'model_cadastro', TRUE);
        $tipo_usuario = array();
        $usuario_input = array();
        $endereco_input = array();
        $passageiro_input = array();

        $usuario_input['tipuser_tip_user'] = $this->input->post('tipuser_tip_user');
        $usuario_input['nome'] = $this->input->post('nome');
        $usuario_input['sobrenome'] = $this->input->post('sobrenome');
        $usuario_input['senha'] = md5($this->input->post('senha'));
        $usuario_input['rg'] = $this->input->post('rg');
        $usuario_input['cpf'] = $this->input->post('cpf');
        $usuario_input['email'] = $this->input->post('email');
        $usuario_input['telefone'] = $this->input->post('telefone');
        $usuario_input['sexo'] = $this->input->post('sexo');

        $passageiro_input['emp_cod_empresa'] = $this->input->post('emp_cod_empresa');
        $passageiro_input['turma'] = $this->input->post('turma');
        $passageiro_input['curso'] = $this->input->post('curso');
        $passageiro_input['matricula'] = $this->input->post('matricula');

        $endereco_input['cep'] = $this->input->post('cep');
        $endereco_input['rua'] = $this->input->post('rua');
        $endereco_input['numero'] = $this->input->post('numero');
        $endereco_input['complemento'] = $this->input->post('complemento');
        $endereco_input['bairro'] = $this->input->post('bairro');
        $endereco_input['cidade'] = $this->input->post('cidade');
        $endereco_input['estado'] = $this->input->post('estado');


        $checking_insert = $this->model_cadastro->cadastro_usuario_form($usuario_input, $passageiro_input, $endereco_input);
        if ($checking_insert) {
            redirect('Erro_cadastro');
        } else {
            redirect('Pagina_usuario');
        }
    }

        public function cadastrarMotorista(){
            $this->load->model('Cadastro_model', 'model_cadastro', TRUE);
            $tipo_usuario = array();
            $usuario_input = array();
            $endereco_input = array();
            $motorista_input = array();

            $usuario_input['tipuser_tip_user'] = $this->input->post('tipuser_tip_user');
            $usuario_input['nome'] = $this->input->post('nome');
            $usuario_input['sobrenome'] = $this->input->post('sobrenome');
            $usuario_input['senha'] = md5($this->input->post('senha'));
            $usuario_input['rg'] = $this->input->post('rg');
            $usuario_input['cpf'] = $this->input->post('cpf');
            $usuario_input['email'] = $this->input->post('email');
            $usuario_input['telefone'] = $this->input->post('telefone');
            $usuario_input['sexo'] = $this->input->post('sexo');

            $motorista_input['ativo'] = $this->input->post('ativo');
            $motorista_input['cnh'] = $this->input->post('cnh');
            $motorista_input['emp_idempresa'] = $this->input->post('emp_idempresa');
            $motorista_input['id_motorista'] = $this->input->post('id_motorista');
            $motorista_input['user_iduser'] = $this->input->post('user_iduser');
            
            $endereco_input['cep'] = $this->input->post('cep');
            $endereco_input['rua'] = $this->input->post('rua');
            $endereco_input['numero'] = $this->input->post('numero');
            $endereco_input['complemento'] = $this->input->post('complemento');
            $endereco_input['bairro'] = $this->input->post('bairro');
            $endereco_input['cidade'] = $this->input->post('cidade');
            $endereco_input['estado'] = $this->input->post('estado');






            $checking_insert = $this -> model_cadastro -> cadastro_motorista_form($usuario_input, $motorista_input, $endereco_input);
            if($checking_insert){
                redirect('Erro_cadastro');
            }else{
                redirect('Pagina_usuario');
            }

    }
}

