<?php
session_start();
require("head.php");
require("cabecalho.php");
include('../backend/pagina_restrita.php');
pagina_motorista();
?>

<head>
    <title>Excluir conta</title>
</head>
<div class="container">
    <div class="col-md-12 mt-5 text-center"> 
        <a href="perfil.php">
            <button type="submit" class="btn btn-info mb-5" name="excluir"> Não quero excluir minha conta</button>
        </a>    
        <form action="../backend/Perfil.php" method="GET">
            <button type="submit" class="btn btn-danger" name="excluir"> Excluir minha conta</button>
        </form>
    </div>
</div>