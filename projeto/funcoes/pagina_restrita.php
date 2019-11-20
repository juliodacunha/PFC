<?php

// if(!isset($_SESSION)){
//     session_start();
// }

function pagina_motorista () {
     if(isset($_SESSION['id'])){
       $id_usuario = $_SESSION['id'];
       $query = "select tipuser_tip_user from usuarios where id_usuario = '$id_usuario'"; 
       $result = mysqli_query($conexao, $query);
       $linha = mysqli_num_rows($result);
       $rows = [];
       $linha = mysqli_fetch_assoc($result);
       $rows[] = $linha;
       $tipo_usuario = $rows[0]['tipuser_tip_user'];
     }
     if($tipo_usuario!=2){
         header('Location: ../index.php');
    }
}

?>