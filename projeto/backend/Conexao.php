<?php 

define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'pfc');
$link = mysqli_connect(HOST, USUARIO, SENHA, DB) or DIE("Nao foi possível conectar");
 
?>