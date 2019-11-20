<?php
session_start();
require("head.php");
require("cabecalho.php");
//apenas motoristas podem ver a página
  
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
$id_usuario = $_SESSION['id'];
?>

<head>
    <title>Excluir conta</title>
</head>
<div class="container">
    <div class="col-md-12 mt-5 text-center"> 
        <a href="perfil.php">
            <button type="submit" class="btn btn-info mb-5" name="excluir"> Não quero excluir minha conta</button>
        </a>    
        <form action="../funcoes/Perfil.php" method="GET">
            <button type="submit" class="btn btn-danger" name="excluir"> Excluir minha conta</button>
        </form>
    </div>
</div>