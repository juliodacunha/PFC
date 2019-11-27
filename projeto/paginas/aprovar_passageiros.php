<?php
require("cabecalho.php");
include('../backend/pagina_restrita.php');
pagina_motorista();
if(!isset($_SESSION)){
  session_start();
}
$aprovar_passageiros = $conexao->query("SELECT imagem, nome, sobrenome, email, cpf, rg, sexo, telefone, aprovado, matricula, curso, turma, rua, numero, bairro, cidade from usuarios, passageiros, enderecos where aprovado = 0 and id_usuario = id_usuario_id and id_passageiro = id_passageiro_id");
?>

<div class="container-fluid">
  <div class="table-responsive">
    <h3 class="register-heading my-5 mx-auto" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 30PX; text-align: center;">Aprovas novos passageiros</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Foto</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">CPF</th>
          <th scope="col">RG</th>
          <th scope="col">Telefone</th>
          <th scope="col">Matricula</th>
          <th scope="col">Turma</th>
          <th scope="col">Endereço</th>  
          <th scope="col">Cidade</th>
          <th scope="col">Aceitar</th>
          <th></th>
        </tr>
      </thead>
      <?php 
      $i = 0;
      while($dado = $aprovar_passageiros->fetch_array()){ $i++ ?>
      <tbody>
        <form method="GET">
        <td><?php if($dado['imagem'] != null){?><a href="../img/usuarios/<?php echo $dado['imagem']; ?>"><div style=""><img class="zoom" <?php if($dado['imagem'] != null){?> src="../img/usuarios/<?php echo $dado['imagem']; ?>"><?php }?></a><?php }else{ echo "";} ?></div></td>
        <td><?php echo $dado["nome"].' '.$dado["sobrenome"]; ?> </td>  
        <td><?php echo $dado['email']; ?></td>
        <td><?php $cpf = $dado['cpf'];
        echo $dado['cpf']; ?></td>
        <td><?php echo $dado['rg']; ?></td>
        <td><?php echo $dado['telefone']; ?></td>
        <td><?php echo $dado['matricula']; ?></td>
        <td><?php echo $dado['turma']; ?></td>
        <td><?php echo $dado["rua"].', '.$dado["numero"].' - '.$dado["bairro"]; ?> </td>  
        <td><?php echo $dado['cidade']; ?></td>
        <input type="hidden" name="cpf" id="cpf" value="<?php echo $cpf; ?>">
        <td><button type="submit" class="btn btn-primary btn-sm" name="aprovacao"> <a href="confirmar_passageiro.php?cpf=<?php echo $cpf; ?>">confirmar</a></button></td>
        <?php } ?>
        </form>
      </tbody>
    </table>
  </div>
</div>
