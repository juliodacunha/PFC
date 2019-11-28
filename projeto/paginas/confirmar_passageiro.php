<?php
require('cabecalho.php');
$id_usuario = $_SESSION['id']; $query = "select tipuser_tip_user from usuarios where id_usuario = '$id_usuario'"; $result = mysqli_query($link, $query); $linha = mysqli_num_rows($result); $rows = []; $linha = mysqli_fetch_assoc($result); $rows[] = $linha; $tipo_usuario = $rows[0]['tipuser_tip_user'];
if($tipo_usuario!=2){ header('Location: ../index.php'); }
if(!isset($_SESSION)){
    session_start();
}
$cpf = $_GET['cpf'];

//descobrir ID do usuário a ser excluido
$query = "select id_end_passageiro, id_passageiro, id_usuario, nome, email, matricula, cep from enderecos, passageiros, usuarios where cpf = '$cpf' and id_usuario = id_usuario_id and id_passageiro = id_passageiro_id"; 
$result = mysqli_query($link, $query);
$linha = mysqli_num_rows($result);
$rows = [];
$linha = mysqli_fetch_assoc($result);
$rows[] = $linha;
$id_end_passageiro = $rows[0]['id_end_passageiro'];
$id_passageiro = $rows[0]['id_passageiro'];
$id_usuario = $rows[0]['id_usuario'];
$nome = $rows[0]['nome'];
$email = $rows[0]['email'];
$matricula = $rows[0]['matricula'];
$cep = $rows[0]['cep'];
?>

<div class="container">
    <div class="col-md-12 mt-5 text-center"> 
    <p>Você está alterando o usuário <?php echo $nome; ?>, com o email <?php echo $email; ?>, matrícula <?php echo $matricula; ?> e CEP <?php echo $cep; ?>.</p>
        <form method="POST">
             <select name="aprovarrecusar">
                <option value="0">Selecione uma opção</option> 
                <option value="1">Aprovar conta</option>
                <option value="2">Recusar e excluir conta</option>
            </select>
            <div class="mt-3"> 
                <button class="btn btn-primary btn-sm" type="submit" name="enviar">Enviar</button>
            </div>
        </form>    
    <button class="btn btn-secondary btn-sm" type="button" name="enviar"><a style="color: white;" href="aprovar_passageiros.php">Voltar</button>
    </div>
</div>

<?php
if(isset($_POST['enviar'])){
    $aprovado = $_POST['aprovarrecusar'];
    if($aprovado == 2){ //funcao de excluir
        //linhas abaixo para excluir o usuário
        $sql = "DELETE FROM enderecos WHERE id_end_passageiro = '$id_end_passageiro'";
        if (mysqli_query($link, $sql)) {
            $sql = "DELETE FROM passageiros WHERE id_passageiro = '$id_passageiro'";
            if (mysqli_query($link, $sql)) {
                $sql = "DELETE FROM usuarios WHERE id_usuario = '$id_usuario'";
                if (mysqli_query($link, $sql)) {
                    echo "Usuário excluido com sucesso";
                    $url="aprovar_passageiros.php";
                    echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
                    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $url . '">';
                }
            }
        } else {
            echo "Erro ao excluir: " . mysqli_error($link);
        }
    }else{
        $sql = "UPDATE usuarios SET aprovado = '$aprovado' WHERE cpf = '$cpf'";
        if (mysqli_query($link, $sql)) {
            echo "Confirmado! <br>";
            $url="aprovar_passageiros.php";
            echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $url . '">';
            
        }
    }    
}  
?>     