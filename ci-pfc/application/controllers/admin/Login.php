<?php
class Login extends CI_Controller{
    function index(){
        $this->load->view('admin/login');
    }

    function verify(){       
        $this->load->model('Admin');
        $check = $this->admin->validate();
        
        if($check){
            redirect('pagina_usuario');
        }else{
            redirect('admin');
        }
    }
}

?>