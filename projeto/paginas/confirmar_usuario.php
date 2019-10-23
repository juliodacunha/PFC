<?php
require('cabecalho.php');
$cpf = $_GET['cpf'];
?>

<div class="container">
    <div class="col-md-12 mt-5 text-center"> 
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
    <button class="btn btn-secondary btn-sm" type="button" name="enviar"><a href="aprovar_motoristas.php">Voltar</button>
    </div>
</div>

<?php
if(isset($_POST['enviar'])){
    $aprovado = $_POST['aprovarrecusar'];
    $sql = "UPDATE usuarios SET aprovado = '$aprovado' WHERE cpf = '$cpf'";
    if (mysqli_query($conexao, $sql)) {
        echo "Confirmado! <br>";
        header('refresh:1;url=aprovar_motoristas.php');
    }
}         
?>