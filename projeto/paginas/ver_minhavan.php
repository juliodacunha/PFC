<?php
include('../backend/Verifica_login.php');
require('cabecalho.php');
include('../backend/pagina_restrita.php');
pagina_passageiro();

$id_usuario = $_SESSION['id'];
$query = "SELECT id_motorista_id FROM usuarios, passageiros WHERE id_usuario = $id_usuario AND id_usuario = id_usuario_id"; 
$result = mysqli_query($conexao, $query);
$linha = mysqli_num_rows($result);
$rows = [];
$linha = mysqli_fetch_assoc($result);
$rows[] = $linha;
$id_motorista = $rows[0]['id_motorista_id'];

$sql = $conexao->query("SELECT imagem, nome, sobrenome, rua, numero, bairro, complemento, cidade, cep, telefone, email, cpf, rg, turma, curso FROM usuarios, passageiros, enderecos WHERE id_usuario = id_usuario_id AND id_motorista_id = '$id_motorista' AND id_passageiro = id_passageiro_id ") or die ($conexao->error);

$descobrir_nome = $conexao->query("SELECT nome, sobrenome FROM usuarios, motoristas WHERE id_usuario = user_iduser and id_motorista = '$id_motorista'");
while($info = $descobrir_nome->fetch_array()){
  $nomemotorista = $info['nome']." ".$info['sobrenome'];
}
if(empty($idmot)){
  echo "";
}

?>
<html lang="en">
<head>
    <title>Minha van</title>
</head>
<div class="container">
<h3 class="register-heading my-5 mx-auto" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 30PX; text-align: center;"><?php if(isset($nomemotorista)){ ?> Van do <?php echo $nomemotorista; }else{ $semmotorista = 1; echo "Você não tem uma van"; } ?></h3>

<?php 
if(!isset($semmotorista)){
?>  

<table class="table table-striped">
<thead>
    <tr>
      <th scope="col">Foto</th>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
      <th scope="col">Turma</th>
      <th></th>
    </tr>
  </thead>
  <?php while($info = $sql->fetch_array()){ ?>
    <tbody>
    <td><?php if($info['imagem'] != null){?><a href="../img/usuarios/<?php echo $info['imagem']; ?>"><div style=""><img class="zoom" <?php if($info['imagem'] != null){?> src="../img/usuarios/<?php echo $info['imagem']; ?>"><?php }?></a><?php }else{ echo "";} ?></div></td>
    <td><?php echo $info['nome']." ".$info['sobrenome']; ?></td>
    <td><?php echo $info['telefone']; ?></td>
    <td><?php echo $info['email']; ?></td>
    <td><?php echo $info['turma'].", ".$info['curso'] ?></td>
    </tbody>
    <?php } ?>
</table>

<?php } ?>