<?php
require("cabecalho.php");
require("../backend/calendario.php");
include('../backend/pagina_restrita.php');
pagina_motorista();
?>

<html lang="en">
<head>
    <title>Verificar passageiros</title>
</head>

<h3 class="register-heading my-5 mx-auto" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 30PX; text-align: center;">Selecione a data para verificar os passageiros</h3>

<?php

if(isset($_SESSION['id'])){
  $id_usuario = $_SESSION['id'];
  $query = "select tipuser_tip_user from usuarios where id_usuario = '$id_usuario'"; 
  $result = mysqli_query($conexao, $query);
  $linha = mysqli_num_rows($result);
  $rows = [];
  $linha = mysqli_fetch_assoc($result);
  $rows[] = $linha;
  $tipo_usuario = $rows[0]['tipuser_tip_user'];
}

if($tipo_usuario ==2){
  if(isset($_GET['mes'])){
      $mes_escolhido = $_GET['mes'];
      $dia_escolhido = $_GET['dia'];
      $data = $dia_escolhido.'/'.$mes_escolhido;

      MostreCalendario($mes_escolhido);

      $id_usuario = $_SESSION['id'];
      //echo $id_usuario;
      //Descobrir a id do motorista 
      $query = "select id_motorista from motoristas, usuarios where id_usuario = user_iduser and user_iduser = '$id_usuario'"; 
      $result = mysqli_query($conexao, $query);
      $linha = mysqli_num_rows($result);
      $rows = [];
      $linha = mysqli_fetch_assoc($result);
      $rows[] = $linha;
      $id_motora = $rows[0]['id_motorista'];
      //echo $id_motora;
      
      //Descobrir os seus passageiros
      $consulta1 = $conexao->query("SELECT nome, sobrenome, rua, bairro, complemento, numero, telefone 
      from usuarios, tipo_usuarios, passageiros, enderecos
      where  
      id_usuario not in(SELECT id_usuario from usuarios, corridas
      where usuario_id_usuario = id_usuario and data_corrida = '$data' and horario_ida <> 'Nao vou' )
      and tipuser_tip_user = tip_user and descricao = 'passageiro' and id_usuario = id_usuario_id and id_passageiro = id_passageiro_id and id_motorista_id = '$id_motora'") or die ($conexao->error);

      $consulta2 = $conexao->query("SELECT 
      id_usuario, nome, sobrenome, telefone, email, sexo, bairro, rua, numero, complemento, id_passageiro, id_motorista_id 
      from usuarios, passageiros, enderecos, corridas
      where id_usuario = id_usuario_id and id_passageiro = id_passageiro_id and id_usuario = usuario_id_usuario and data_corrida = '$data' and horario_ida= 'Nao vai' and id_motorista_id = '$id_motora'") or die ($conexao->error);

      $consulta3 = $conexao->query("SELECT nome, sobrenome, rua, bairro, complemento, numero, telefone
      from usuarios, tipo_usuarios, passageiros, enderecos
      where id_usuario not in(SELECT id_usuario from usuarios, corridas
      where usuario_id_usuario = id_usuario and data_corrida = '$data' and horario_volta <> 'Volto 12h' and horario_volta <> 'Nao volto' )
      and tipuser_tip_user = tip_user and descricao = 'passageiro' and id_usuario = id_usuario_id and id_passageiro = id_passageiro_id and id_motorista_id = '$id_motora'") or die ($conexao->error);

      $consulta4 = $conexao->query("SELECT 
      id_usuario, nome, sobrenome, telefone, email, sexo, bairro, rua, numero, complemento, id_passageiro, id_motorista_id 
      from usuarios, passageiros, enderecos, corridas
      where id_usuario = id_usuario_id and id_passageiro = id_passageiro_id and id_usuario = usuario_id_usuario and data_corrida = '$data' and horario_volta= 'Volta 12h' and id_motorista_id = '$id_motora'") or die ($conexao->error);

      $consulta5 = $conexao->query("SELECT id_usuario, nome, sobrenome, telefone, email, sexo, bairro, rua, numero, complemento, id_passageiro, id_motorista_id 
      from usuarios, passageiros, enderecos, corridas
      where id_usuario = id_usuario_id and id_passageiro = id_passageiro_id and id_usuario = usuario_id_usuario and data_corrida = '$data' and horario_volta = 'Nao volta' and id_motorista_id = '$id_motora' ") or die ($conexao->error);
      
      echo "<p class='text-center my-5'>Exibindo informações da data $dia_escolhido/$mes_escolhido/2019, <a href='ver_todospassageiros.php'> altere o mês aqui</a> ou altere o dia selecionando no calendário acima.</p>";
      

  ?>
  <h3 class="register-heading my-5 mx-auto" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 30PX; text-align: center;">Dados de seus passageiros</h3>

  <div class="container">
  
  <div class="col-md-12 register-right">
      <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
          <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Ida</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Volta</a>
          </li>
      </ul>
      <!-- IDA -->
      <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="table-responsive">
            <table class="table my-5 table-bordered table-striped" style= "border;" >
              <thead class="thead-light">
                <tr>
                  <th scope="col" style="width:  8.1%">Vão</th>
                  <th scope="col" style="width:  25%">Nome</th>
                  <th scope="col" style="width:  35%">Endereço</th>
                  <th scope="col" style="width:  15%">Complemento</th>
                  <th scope="col" style="width:  15%">Telefone</th>
                </tr>
              </thead>
              <?php $contador = 0; ?>
              <?php while($dado = $consulta1->fetch_array()){ $contador++?>
              <tbody class="rounded-circle">
                <td scope="col"><?php $contador; echo $contador; ?></td>  
                <td><?php echo $dado["nome"]." ".$dado["sobrenome"]; ?> </td>  
                <td><?php echo $dado["rua"].", ".$dado["numero"]." - ".$dado["bairro"]; ?> </td>  
                <td><?php echo $dado["complemento"]; ?> </td> 
                <td><?php echo $dado["telefone"]; ?> </td>  
              </tbody>
              <?php } ?>
            </table>
        
            <table class="table my-5 table-bordered table-striped" style= "border;" >
              <thead class="thead-light">
                <tr>
                  <th scope="col" style="width:  8.1%">Não vão</th>
                  <th scope="col" style="width:  25%">Nome</th>
                  <th scope="col" style="width:  35%">Endereço</th>
                  <th scope="col" style="width:  15%">Complemento</th>
                  <th scope="col" style="width:  15%">Telefone</th>
                </tr>
              </thead>
              <?php $contador = 0; ?>
              <?php while($dado2 = $consulta2->fetch_array()){ $contador++; ?>
              <tbody class="rounded-circle">
                <td scope="col"><?php $contador; echo $contador; ?></td>  
                <td><?php echo $dado2["nome"]." ".$dado2["sobrenome"]; ?> </td>  
                <td><?php echo $dado2["rua"].", ".$dado2["numero"]." - ".$dado2["bairro"]; ?> </td>  
                <td><?php echo $dado2["complemento"]; ?> </td>  
                <td><?php echo $dado2["telefone"]; ?> </td>  
              </tbody>
              <?php } ?>
            </table>
          </div>
          </div>

        <!-- VOLTA -->

        <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="table-responsive">
        <table class="table my-5 table-bordered table-striped" style= "border;" >
              <thead class="thead-light">
                <tr>
                  <th scope="col" style="width:  8.5%">12h</th>
                  <th scope="col" style="width:  25%">Nome</th>
                  <th scope="col" style="width:  35%">Endereço</th>
                  <th scope="col" style="width:  15%">Complemento</th>
                  <th scope="col" style="width:  15%">Telefone</th>
                </tr>
              </thead>
              <?php $contador = 0; ?>
              <?php while($dado4 = $consulta4->fetch_array()){ $contador++; ?>
              <tbody class="rounded-circle">
                <td scope="col"><?php $contador; echo $contador; ?></td>   
                <td><?php echo $dado4["nome"]." ".$dado4["sobrenome"]; ?> </td>  
                <td><?php echo $dado4["rua"].", ".$dado4["numero"]." - ".$dado4["bairro"]; ?> </td>  
                <td><?php echo $dado4["complemento"]; ?> </td>  
                <td><?php echo $dado4["telefone"]; ?> </td>  
              </tbody>
              <?php } ?>
            </table>

            <table class="table my-5 table-bordered table-striped" style= "border;" >
              <thead class="thead-light">
                <tr>
                  <th scope="col" style="width:  8.5%">17h</th>
                  <th scope="col" style="width:  25%">Nome</th>
                  <th scope="col" style="width:  35%">Endereço</th>
                  <th scope="col" style="width:  15%">Complemento</th>
                  <th scope="col" style="width:  15%">Telefone</th>
                </tr>
              </thead>
              <?php $contador = 0; ?>
              <?php while($dado3 = $consulta3->fetch_array()){ $contador++; ?>
              <tbody class="rounded-circle">
                <td scope="col"><?php $contador; echo $contador; ?></td>  
                <td><?php echo $dado3["nome"]." ".$dado3["sobrenome"]; ?> </td>  
                <td><?php echo $dado3["rua"].", ".$dado3["numero"]." - ".$dado3["bairro"]; ?> </td>  
                <td><?php echo $dado3["complemento"]; ?> </td>  
                <td><?php echo $dado3["telefone"]; ?> </td>  
              </tbody>
              <?php } ?>
            </table>

            <table class="table my-5 table-bordered table-striped" style= "border;" >
              <thead class="thead-light">
                <tr>
                  <th scope="col" style="width:  8.5%">Não volta</th>
                  <th scope="col" style="width:  25%">Nome</th>
                  <th scope="col" style="width:  35%">Endereço</th>
                  <th scope="col" style="width:  15%">Complemento</th>
                  <th scope="col" style="width:  15%">Telefone</th>
                </tr>
              </thead>
              <?php $contador = 0; ?>
              <?php while($dado5 = $consulta5->fetch_array()){ $contador++; ?>
              <tbody class="rounded-circle">
                <td scope="col"><?php $contador; echo $contador; ?></td>  
                <td><?php echo $dado5["nome"]." ".$dado5["sobrenome"]; ?> </td>  
                <td><?php echo $dado5["rua"].", ".$dado5["numero"]." - ".$dado5["bairro"]; ?> </td>  
                <td><?php echo $dado5["complemento"]; ?> </td>  
                <td><?php echo $dado5["telefone"]; ?> </td>  
              </tbody>
              <?php } ?>
            </table>

        </div>
        </div>
        </div>
  </div>

  <?php
  }else{
    MostreCalendarioCompleto();
  }  
}else{
  header('Location: ../index.php');
}     
?>

