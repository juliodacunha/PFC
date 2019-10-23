<?php
//require("../funcoes/Conexao.php");
require("head.php");
require("cabecalho.php");


$aprovar_motoristas = $conexao->query("SELECT nome, sobrenome, email, cpf, rg, sexo, telefone, aprovado, cnh from usuarios, motoristas where aprovado = 0 and id_usuario = user_iduser");
?>
<div class="container">
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
      <th></th>
    </tr>
  </thead>
  <?php 
  $i = 0;
  while($dado = $aprovar_motoristas->fetch_array()){ $i++ ?>
    <tbody>
    <form method="GET">
    <td><?php echo $dado['nome']; ?></td>
    <td><?php echo $dado['sobrenome']; ?></td>
    <td><?php echo $dado['email']; ?></td>
    <td><?php $cpf = $dado['cpf'];
    echo $dado['cpf']; ?></td>
    <td><?php echo $dado['rg']; ?></td>
    <td><?php echo $dado['sexo']; ?></td>
    <td><?php echo $dado['telefone']; ?></td>
    <td><?php echo $dado['cnh']; ?></td>
    <input type="hidden" name="cpf" id="cpf" value="<?php echo $cpf; ?>">
      <td><button type="submit" class="btn btn-primary btn-sm" name="aprovacao"> <a href="confirmar_usuario.php?cpf=<?php echo $cpf; ?>">confirmar</a></button></td>
      <?php } ?>
      
    </form>
    </tbody>
</table>
</div>
