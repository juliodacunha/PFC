<?php

if(!isset($_SESSION)){
    session_start();
    $id_usuario = $_SESSION['id'];
}

if(isset($_POST['logar'])){
    if (!isset($_SESSION['email'])) {
        
        $email = mysqli_real_escape_string($conexao, $_POST['email']);
        $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

        //Linha abaixo para verificar se o usuário foi aprovado pelo motorista.
        $usuario_aprovado = "SELECT aprovado from usuarios where email = '$email'";
        $resultado = mysqli_query($conexao, $usuario_aprovado);
        $linha_resultado = mysqli_num_rows($resultado);
        //print_r($linha_resultado);
        $checar_array = [];
        $linha_resultado = mysqli_fetch_assoc($resultado);
        $checar_array[] = $linha_resultado;
        //print_r($checar_array[0]['aprovado']);
        $usuario_aprovado = $checar_array[0]['aprovado'];
        
        if($usuario_aprovado == 1){    
            $query = "select id_usuario, email, nome from usuarios where email = '$email' and senha = md5('$senha')"; 
            $result = mysqli_query($conexao, $query);
            $linha = mysqli_num_rows($result);
            //print_r($linha);
        }else{
            header('Location: ../paginas/erro.php');
        }

        if($linha == 1){
            //quando ==1, significa que o usuário está autenticado
            //código para pegar a ID do Mysql do usuário conectado.
            $rows = [];
            $linha = mysqli_fetch_assoc($result);
            $rows[] = $linha;
            $id_usuario = $rows[0]['id_usuario'];
            $_SESSION['id'] = $id_usuario;
                $_SESSION['email'] = $email;
                header('Location: ../paginas/perfil.php'); 
                exit(); 
        }else{
        //usuário nao autenticado
        }
    }
}
?>