<?php
if(!isset($_SESSION)){
    session_start();
}
include("../paginas/cabecalho.php");

$usu_codigo = intval($_GET['codigo']);
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

?>
<div class="text-center mt-5">
    <p> Tem ceteza que deseja excluir? </p>
    <form method="post">
        <button class="btn btn-primary" role="button"><a href="../paginas/passageiro_pelomot.php" style="text-decoration: none;">Não, desejo voltar</a></button><br>
        <button class="btn btn-danger mt-1" type="submit" name="confirmar_exclusao">Sim</button>
    </form>
</div>
<?php

if(isset($_POST['confirmar_exclusao'])){
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

    }
?>
