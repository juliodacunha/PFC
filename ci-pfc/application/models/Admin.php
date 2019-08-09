<?php
class Admin extends CI_Model{
    function validate(){
        $arr['email'] = $this->input->post('email');
        $arr['senha'] = md5($this->input->post('senha'));
        return $this->db->get_where('usuarios',$arr)->row();
    }
}


?>