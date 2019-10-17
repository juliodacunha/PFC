<?php
session_start();
include("../funcoes/Conexao.php");


$usu_codigo = intval($GET['codigo']);

$sql_code = $conexao->query("DELETE from usuarios where id_usuario = '$usu_codigo") or die ($conexao->error);
 
if($sql_query){
    echo "<script> location.href='index.php?p=inicial; </script>";
}else{  echo "<script> alert('Não foi possível deletar o passageiro.); 
    location.href='index.php?p=inicial; </script>";

}
?>
<script>

</script>