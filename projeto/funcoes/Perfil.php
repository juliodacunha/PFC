<?php
session_start();
require('conexao.php');

if(isset($_GET['editar'])){
    $email = $_SESSION['email'];
    $result = $mysqli->query("SELECT * FROM usuarios WHERE email=$email") or die($mysqli->error());
    echo $result;

}

?>