<?php
include('../backend/Verifica_login.php');
require("cabecalho.php");
$id_usuario = $_SESSION['id']; $query = "select tipuser_tip_user from usuarios where id_usuario = '$id_usuario'"; $result = mysqli_query($link, $query); $linha = mysqli_num_rows($result); $rows = []; $linha = mysqli_fetch_assoc($result); $rows[] = $linha; $tipo_usuario = $rows[0]['tipuser_tip_user'];
if($tipo_usuario!=2){ header('Location: ../index.php'); }
$id_usuario = $_SESSION['id'];


//Abaixo o código de busca no banco de dados sobre o formulário de perfil do passageiro
$email = $_SESSION['email'];
$result = $link->query("SELECT nome, sobrenome, cpf, rg, telefone, email, senha, curso, turma, matricula, cep, rua, numero, bairro, cidade, estado, complemento
from usuarios, passageiros, enderecos;") or die($link->error);
$arrayPassageiro = $result->fetch_assoc();
//Abaixo perfil motorista
$resultMotorista = $link->query("SELECT nome, sobrenome, cpf, rg, telefone, email, senha, cnh
from usuarios, motoristas
where email = '$email' and user_iduser = id_usuario") or die($link->error);
$arrayMotorista = $resultMotorista->fetch_assoc();

//IF para nao dar erro no HTML caso o usuário seja um passageiro e nao um motorista.
if($arrayMotorista == null){
  $arrayMotorista = array();
}

//Verificar se o perfil é de motorista ou passageiro e exibir os dados
if (array_key_exists("cnh", $arrayMotorista)) {
  //echo "O elemento 'cnh' está no array!";
  $row = $arrayMotorista;
  $validar = 0;
}elseif(array_key_exists("matricula", $arrayPassageiro)){
  header('Location: ../index.php');
    exit;
}

$consulta = $link->query("SELECT 
id_usuario, imagem, nome, sobrenome, telefone, email, sexo, bairro, rua, numero, complemento, id_passageiro, id_motorista_id 
from usuarios, passageiros, enderecos 
where id_usuario = id_usuario_id and id_passageiro = id_passageiro_id and aprovado = 1") or die ($link->error);

?>
<html lang="en">
<head></head>
<div class="container-fluid">
<div class="table-responsive">
<h3 class="register-heading my-5 mx-auto" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 30PX; text-align: center;">Visualização dos dados de todos os passageiros</h3>

<table class="table table-striped">
<thead>
    <tr>
      <th scope="col">Foto</th>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
      <th scope="col">Endereço</th>
      <th scope="col">Complemento</th>
      <th scope="col">Motorista</th>
      <th scope="col">Alterar motorista</th>
      <th scope="col">Alterar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>

   <?php while($dado = $consulta->fetch_array()){ ?>
    <td><?php if($dado['imagem'] != null){?><a href="../img/usuarios/<?php echo $dado['imagem']; ?>"><div style=""><img class="zoom" <?php if($dado['imagem'] != null){?> src="../img/usuarios/<?php echo $dado['imagem']; ?>"><?php }?></a><?php }else{ echo "";} ?></div></td>
    <td><?php echo $dado["nome"].' '.$dado["sobrenome"]; ?> </td>  
    <td><?php echo $dado["telefone"]; ?> </td>  
    <td><?php echo $dado["email"]; ?> </td>  
    <td><?php echo $dado["rua"].', '.$dado["numero"].' - '.$dado["bairro"]; ?> </td>  
    <td><?php echo $dado["complemento"]; ?> </td>  
    <td><?php 
    $idmot = $dado["id_motorista_id"];
    if(empty($idmot)){
      
    }
      
    $descobrir_nome = $link->query("SELECT nome, sobrenome FROM usuarios, motoristas WHERE id_usuario = user_iduser and id_motorista = '$idmot'");
    while($info = $descobrir_nome->fetch_array()){
      $nomemotorista = $info['nome'];
    }
    if(empty($idmot)){
      echo "";
    }else{
      echo $nomemotorista;
    }
    ?>
    </td>

    <form method="GET">
      <td>
        <select name="novomotorista">
        <option value="0">Não definido</option>
          <?php
          //puxar dado dos motoristas
          $motorista = $link->query("select nome, sobrenome, cnh, id_motorista 
                                      from usuarios, motoristas 
                                      where id_usuario = user_iduser and emp_idempresa = 1");
          while($informacao = $motorista->fetch_array()){ ?>
          <option value="<?php echo $informacao['id_motorista']; ?>"><?php echo $informacao['nome']." ".$informacao['sobrenome'];  ?></option> 
          <?php } ?>           
        </select> 
      </td>  
      <input type="hidden" value="<?php echo $dado['id_usuario']; ?>" name="user_id" />
      <td> <button type="submit" class="btn btn-primary btn-sm" name="alterar">Alterar</button></td>
    </form>

    <td> <button type="submit" class="btn btn-danger btn-sm"><a style="color: white;" href="../backend/use_excluir.php?codigo=<?php echo $dado["id_passageiro"]; ?>">Excluir</a></button></td>
  
  </tbody>
  <?php }?>
</table>
</div>
</div>

<?php
if(isset($_GET['alterar'])){
  $novo_motorista = $_GET['novomotorista'];
  if($novo_motorista == 0){
    $iduser = $_GET['user_id'];
    $novo_motorista = $_GET['novomotorista'];

    $sql = "UPDATE usuarios, passageiros 
    SET id_motorista_id = NULL
    WHERE id_usuario='$iduser' and id_usuario = id_usuario_id";
    if (mysqli_query($link, $sql)) {
      $url="passageiro_pelomot.php";
      echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
      echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $url . '">';
    }
  }else{
    $novo_motorista = $_GET['novomotorista'];
    $iduser = $_GET['user_id'];

    $sql = "UPDATE usuarios, passageiros 
    SET id_motorista_id = $novo_motorista
    WHERE id_usuario='$iduser' and id_usuario_id = '$iduser'";

    if (mysqli_query($link, $sql)) {
      $url="passageiro_pelomot.php";
      echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
      echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $url . '">';
    } else {
      echo "Erro ao atualizar: " . mysqli_error($link);
    }
  }
}
?>