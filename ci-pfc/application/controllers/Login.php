<?php
/**
 * Created by PhpStorm.
 * User: Julio
 * Date: 28/05/2019
 * Time: 17:12
 */

class Login extends CI_Controller
{
    public function __construct(){
        parent:: __construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('login');
        $this->load->view('footer');
    }

}