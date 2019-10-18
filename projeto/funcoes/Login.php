<?php


if(isset($_POST['logar'])){
    if (!isset($_SESSION['email'])) {
        $email = mysqli_real_escape_string($conexao, $_POST['email']);
        $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

        $query = "select id_usuario, email, nome from usuarios where email = '$email' and senha = md5('$senha')"; 
        $result = mysqli_query($conexao, $query);
        $linha = mysqli_num_rows($result);
        //print_r($linha);

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