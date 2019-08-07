<?php

class Pagina_usuario extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->helper('url');

        if ( ! $this->session->userdata('logged_in')){ 
            $allowed = array(
                'some_method_in_this_controller',
                'other_method_in_this_controller',
            );

            if ( ! in_array($this->router->fetch_method(), $allowed)){
                redirect('Login');
            }
        }
    }

    public function index(){
        $this->load->view('header');
        $this->load->view('pagina_usuario');
        $this->load->view('footer');
    }
}
    

?>