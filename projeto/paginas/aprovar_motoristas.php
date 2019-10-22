<?php
if(!isset($_SESSION)){
  session_start();
}
require("head.php");
require("cabecalho.php");
$aprovar_motoristas = $conexao->query("SELECT nome, sobrenome, email, cpf, rg, sexo, telefone, aprovado, cnh from usuarios, motoristas where aprovado = 0 and id_usuario = user_iduser");
?>

<table class="table">
<thead>
    <tr>
      <th scope="col" >Nome</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Email</th>
      <th scope="col">CPF</th>
      <th scope="col">RG</th>
      <th scope="col">Sexo</th>
      <th scope="col">Telefone</th>
      <th scope="col">CNH</th>
      <th scope="col">Aceitar</th>
    </tr>
  </thead>
  <?php while($dado = $aprovar_motoristas->fetch_array()){ ?>
    <tbody>
    <td><?php echo $dado['nome']; ?></td>
    <td><?php echo $dado['sobrenome']; ?></td>
    <td><?php echo $dado['email']; ?></td>
    <td><?php echo $dado['cpf']; ?></td>
    <td><?php echo $dado['rg']; ?></td>
    <td><?php echo $dado['sexo']; ?></td>
    <td><?php echo $dado['telefone']; ?></td>
    <td><?php echo $dado['cnh']; ?></td>
    <td><select name="aprovado">
        <option value="0" selected>Selecione uma opção</option> 
        <option value="1">Aprovar conta</option>
        <option value="2">Recusar e excluir conta</option>
        </select>
    </td>
    </tbody>
  <?php }?>
</table>
