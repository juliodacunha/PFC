<?php
session_start();
include("../funcoes/Conexao.php");


$usu_codigo = intval($_GET['codigo']);
//print_r ($usu_codigo);
$consulta = $conexao->query("SELECT nome, sobrenome, telefone, email, sexo, bairro, rua, numero, complemento, id_passageiro 
from usuarios, passageiros, enderecos 
where id_usuario = id_usuario_id and id_passageiro = id_passageiro_id") or die ($conexao->error);

while($dado = $consulta->fetch_array()){
    $descobrir_id = "SELECT id_usuario from passageiros, usuarios where id_passageiro = '$usu_codigo' and id_usuario = id_usuario_id";
    $result = mysqli_query($conexao, $descobrir_id);
    $linha = mysqli_num_rows($result);
    $rows = [];
    $linha = mysqli_fetch_assoc($result);
    $rows[] = $linha;
    $id_usuario = $rows[0]['id_usuario'];
}




$sql = "DELETE FROM enderecos WHERE id_passageiro_id = '$usu_codigo'";
        if (mysqli_query($conexao, $sql)) {
            $sql = "DELETE FROM passageiros WHERE id_passageiro = '$usu_codigo'";
            if (mysqli_query($conexao, $sql)) {
                $sql = "DELETE FROM usuarios WHERE id_usuario = '$id_usuario'";
                if (mysqli_query($conexao, $sql)) {
                echo "Usuário excluido com sucesso";

                header('refresh:2; url=../paginas/passageiro_pelomot.php');
                }
            }
        } else {
            echo "Erro ao excluir: " . mysqli_error($conexao);
        }


?>
<script>

</script>