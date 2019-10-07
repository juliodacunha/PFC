<?php 

define('HOST', 'localhost');
define('USUARIO', 'aluno');
define('SENHA', 'aluno');
define('DB', 'pfc');
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or DIE("Nao foi possível conectar");
 
?>