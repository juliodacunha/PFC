<?php
session_start();
include('Conexao.php');

if (!isset($_SESSION['email'])) {
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $query = "select id_usuario, email from usuarios where email = '$email' and senha = md5('$senha')"; 
    
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);

   // print_r($query);

    if($row == 1){
    //quando ==1, significa que o usuário está autenticado
        $_SESSION['email'] = $email;
        header('Location: paginas/perfil.php'); 
        exit(); 
    }else{
    //usuário nao autenticado
    }
}
?>