<?php
require_once("cabecalho.php");
$id_usuario = $_SESSION['id']; $query = "select tipuser_tip_user from usuarios where id_usuario = '$id_usuario'"; $result = mysqli_query($link, $query); $linha = mysqli_num_rows($result); $rows = []; $linha = mysqli_fetch_assoc($result); $rows[] = $linha; $tipo_usuario = $rows[0]['tipuser_tip_user'];
if($tipo_usuario!=2){ header('Location: ../index.php'); }
if(!isset($_SESSION)){
  session_start();
}
$aprovar_motoristas = $link->query("SELECT nome, sobrenome, email, cpf, imagem, rg, sexo, telefone, aprovado, cnh from usuarios, motoristas where aprovado = 0 and id_usuario = user_iduser");
?>

<div class="container">
  <div class="table-responsive">
    <h3 class="register-heading my-5 mx-auto" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 30PX; text-align: center;">Aprovar novos motoristas</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Foto</th>
          <th scope="col">Nome</th>
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
          <td><?php if($dado['imagem'] != null){?><a href="../img/usuarios/<?php echo $dado['imagem']; ?>"><div style=""><img class="zoom" <?php if($dado['imagem'] != null){?> src="../img/usuarios/<?php echo $dado['imagem']; ?>"><?php }?></a><?php }else{ echo "";} ?></div></td>
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
          <td><button type="submit" class="btn btn-dark btn-sm" name="aprovacao"> <a style="color: white;" href="confirmar_usuario.php?cpf=<?php echo $cpf; ?>">confirmar</a></button></td>
          <?php } ?>
        </form>
      </tbody>
    </table>
  </div>
</div>
