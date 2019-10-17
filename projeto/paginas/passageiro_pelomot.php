<?php

include('../funcoes/Verifica_login.php');
require("head.php");
require("cabecalho.php");
$id_usuario = $_SESSION['id'];


//Abaixo o código de busca no banco de dados sobre o formulário de perfil do passageiro
$email = $_SESSION['email'];
$result = $conexao->query("SELECT nome, sobrenome, cpf, rg, telefone, email, senha, curso, turma, matricula, cep, rua, numero, bairro, cidade, estado, complemento
from usuarios, passageiros, enderecos;") or die($conexao->error);
$arrayPassageiro = $result->fetch_assoc();
//Abaixo perfil motorista
$resultMotorista = $conexao->query("SELECT nome, sobrenome, cpf, rg, telefone, email, senha, cnh
from usuarios, motoristas
where email = '$email' and user_iduser = id_usuario") or die($conexao->error);
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


$consulta = $conexao->query("SELECT nome, sobrenome, telefone, email, sexo, bairro, rua, numero, complemento, id_passageiro from usuarios, passageiros, enderecos where id_usuario = id_usuario_id and id_passageiro = id_passageiro_id") or die ($conexao->error);


?>
<html lang="en">
<head>
<h3 class="register-heading my-5 mx-auto" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 30PX; text-align: center;">Visualização dos dados de todos os passageiros</h3>

<table class="table">
<thead>
    <tr>
      <th scope="col" >Nome</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
      <th scope="col">Sexo</th>
      <th scope="col">Bairro</th>
      <th scope="col">Rua</th>
      <th scope="col">Número</th>
      <th scope="col">Complemento</th>
      <th scope="col"></th>

    </tr>
  </thead>
   <?php while($dado = $consulta->fetch_array()){ ?>
  <tbody>
    <td><?php echo $dado["nome"]; ?> </td>  
    <td><?php echo $dado["sobrenome"]; ?> </td>  
    <td><?php echo $dado["telefone"]; ?> </td>  
    <td><?php echo $dado["email"]; ?> </td>  
    <td><?php echo $dado["sexo"]; ?> </td>  
    <td><?php echo $dado["bairro"]; ?> </td> 
    <td><?php echo $dado["rua"]; ?> </td>  
    <td><?php echo $dado["numero"]; ?> </td>  
    <td><?php echo $dado["complemento"]; ?> </td>  
    <td> <a href="../funcoes/use_excluir.php?codigo=<?php echo $dado["id_passageiro"]; ?>">Excluir</a></td>
 
  </tbody>
  <?php }?>
</table>