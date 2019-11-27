<?php
include('../backend/pagina_restrita.php');
pagina_motorista();
require('cabecalho.php');
$id_usuario = $_SESSION['id'];
$query = "SELECT id_motorista FROM usuarios, motoristas WHERE id_usuario = $id_usuario AND user_iduser = id_usuario"; 
$result = mysqli_query($conexao, $query);
$linha = mysqli_num_rows($result);
$rows = [];
$linha = mysqli_fetch_assoc($result);
$rows[] = $linha;
$id_motorista = $rows[0]['id_motorista'];
$sql = $conexao->query("SELECT imagem, nome, sobrenome, rua, numero, bairro, complemento, cidade, cep, telefone, email, cpf, rg FROM usuarios, passageiros, enderecos WHERE id_usuario = id_usuario_id AND id_motorista_id = '$id_motorista' AND id_passageiro = id_passageiro_id ") or die ($conexao->error);
?>
<html lang="en">
<head>
    <title>Seus passageiros</title>
</head>

<div class="container-fluid">
<div class="table-responsive">

<h3 class="register-heading my-5 mx-auto" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 30PX; text-align: center;">Seus passageiros</h3>
<table class="table table-striped">
<thead>
    <tr>
      <th scope="col">Foto</th>
      <th scope="col">Nome</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Rua</th>
      <th scope="col">Numero</th>
      <th scope="col">Bairro</th>
      <th scope="col">Complemento</th>
      <th scope="col">Cidade</th>
      <th scope="col">CEP</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
      <th scope="col">CPF</th>
      <th scope="col">RG</th>
      <th></th>
    </tr>
  </thead>
  <?php while($info = $sql->fetch_array()){ ?>
    <tbody>
    <td><?php if($info['imagem'] != null){?><a href="../img/usuarios/<?php echo $info['imagem']; ?>"><div style=""><img class="zoom" <?php if($info['imagem'] != null){?> src="../img/usuarios/<?php echo $info['imagem']; ?>"><?php }?></a><?php }else{ echo "";} ?></div></td>
    <td><?php echo $info['nome']; ?></td>
    <td><?php echo $info['sobrenome']; ?></td>
    <td><?php echo $info['rua']; ?></td>
    <td><?php echo $info['numero']; ?></td>
    <td><?php echo $info['bairro']; ?></td>
    <td><?php echo $info['complemento']; ?></td>
    <td><?php echo $info['cidade']; ?></td>
    <td><?php echo $info['cep']; ?></td>
    <td><?php echo $info['telefone']; ?></td>
    <td><?php echo $info['email']; ?></td>
    <td><?php echo $info['cpf']; ?></td>
    <td><?php echo $info['rg']; ?></td>
    </tbody>
    <?php } ?>
</table>
</div>
</div>