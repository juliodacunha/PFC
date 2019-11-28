<?php
require('cabecalho.php');
$id_usuario = $_SESSION['id']; $query = "select tipuser_tip_user from usuarios where id_usuario = '$id_usuario'"; $result = mysqli_query($link, $query); $linha = mysqli_num_rows($result); $rows = []; $linha = mysqli_fetch_assoc($result); $rows[] = $linha; $tipo_usuario = $rows[0]['tipuser_tip_user'];
if($tipo_usuario!=2){ header('Location: ../index.php'); }
if(!isset($_SESSION)){
    session_start();
}
$cpf = $_GET['cpf'];
//linhas abaixo para descobrir o id do usuário
$query = "select id_motorista, id_usuario, nome, email, cnh from motoristas, usuarios where cpf = '$cpf' and user_iduser = id_usuario"; 
$result = mysqli_query($link, $query);
$linha = mysqli_num_rows($result);
$rows = [];
$linha = mysqli_fetch_assoc($result);
$rows[] = $linha;
$id_motorista = $rows[0]['id_motorista'];
$id_usuario = $rows[0]['id_usuario'];
$nome = $rows[0]['nome'];
$email = $rows[0]['email'];
$cnh = $rows[0]['cnh'];
?>

<div class="container">
    <div class="col-md-12 mt-5 text-center"> 
    <p>Você está alterando o usuário <?php echo $nome; ?>, com o email <?php echo $email; ?> e CNH <?php echo $cnh; ?>.</p>
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
    <button class="btn btn-secondary btn-sm" type="button" name="enviar"><a style="color: white;" href="aprovar_motoristas.php">Voltar</button>
    </div>
</div>

<?php
if(isset($_POST['enviar'])){
    $aprovado = $_POST['aprovarrecusar'];
    if($aprovado == 2){ //funcao de excluir
        //linhas abaixo para excluir o usuário
        $sql = "DELETE FROM motoristas WHERE id_motorista = '$id_motorista'";
        if (mysqli_query($link, $sql)) {
            $sql = "DELETE FROM usuarios WHERE id_usuario = '$id_usuario'";
            if (mysqli_query($link, $sql)) {
                echo "Usuário excluido com sucesso";
                $url="aprovar_motoristas.php";
                echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
                echo '<META HTTP-EQUIV="refresh" content="2;URL=' . $url . '">';
            }
        } else {
            echo "Erro ao excluir: " . mysqli_error($link);
        }
    }else{
        $sql = "UPDATE usuarios SET aprovado = '$aprovado' WHERE cpf = '$cpf'";
        if (mysqli_query($link, $sql)) {
            echo "Confirmado! <br>";
            $url="aprovar_motoristas.php";
            echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="2;URL=' . $url . '">';
        }
    }    
}         
?>