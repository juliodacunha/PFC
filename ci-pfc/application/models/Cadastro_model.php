<?php
/**
 * Created by PhpStorm.
 * User: Julio
 * Date: 15/06/2019
 * Time: 17:58
 */

class Cadastro_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function cadastro_usuario_form($usuario_input, $passageiro_input, $endereco_input){


        $this->db->insert('usuarios',$usuario_input);
        $id_usuario = $this->db->insert_id();

        $passageiro_input['id_usuario_id'] = $id_usuario;
        $this->db->insert('passageiros', $passageiro_input);
        $id_passageiro = $this->db->insert_id();

        $endereco_input['id_passageiro_id'] = $id_passageiro;
        $this->db->insert('enderecos',$endereco_input);

    }

    public function cadastro_motorista_form($usuario_input, $motorista_input, $endereco_input){


        $this->db->insert('usuarios',$usuario_input);
        $id_usuario = $this->db->insert_id();

        $motorista_input['user_iduser'] = $id_usuario;
        $this->db->insert('motoristas', $motorista_input);
        $id_motorista = $this->db->insert_id();


    }

}
