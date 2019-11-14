<?php
require("cabecalho.php");
require("../funcoes/calendario.php");

?>
<html lang="en">
<head>
    <title>Verificar passageiros</title>
</head>

<div class="container">
<h3 class="register-heading my-5 mx-auto" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 30PX; text-align: center;">Selecione a data para verificar os passageiros</h3>


<?php
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
    $consulta = $conexao->query("SELECT 
    id_usuario, nome, sobrenome, telefone, email, sexo, bairro, rua, numero, complemento, id_passageiro, id_motorista_id 
    from usuarios, passageiros, enderecos, corridas
    where id_usuario = id_usuario_id and id_passageiro = id_passageiro_id and id_usuario = usuario_id_usuario and data_corrida = '$data' and horario_ida= 'Vai'") or die ($conexao->error);

    $consulta2 = $conexao->query("SELECT 
    id_usuario, nome, sobrenome, telefone, email, sexo, bairro, rua, numero, complemento, id_passageiro, id_motorista_id 
    from usuarios, passageiros, enderecos, corridas
    where id_usuario = id_usuario_id and id_passageiro = id_passageiro_id and id_usuario = usuario_id_usuario and data_corrida = '$data' and horario_ida= 'Nao vai'") or die ($conexao->error);

    $consulta3 = $conexao->query("SELECT 
    id_usuario, nome, sobrenome, telefone, email, sexo, bairro, rua, numero, complemento, id_passageiro, id_motorista_id 
    from usuarios, passageiros, enderecos, corridas
    where id_usuario = id_usuario_id and id_passageiro = id_passageiro_id and id_usuario = usuario_id_usuario and data_corrida = '$data' and horario_volta= 'Volta 17h'") or die ($conexao->error);

    $consulta4 = $conexao->query("SELECT 
    id_usuario, nome, sobrenome, telefone, email, sexo, bairro, rua, numero, complemento, id_passageiro, id_motorista_id 
    from usuarios, passageiros, enderecos, corridas
    where id_usuario = id_usuario_id and id_passageiro = id_passageiro_id and id_usuario = usuario_id_usuario and data_corrida = '$data' and horario_volta= 'Volta 12h'") or die ($conexao->error);

    $consulta5 = $conexao->query("SELECT 
    id_usuario, nome, sobrenome, telefone, email, sexo, bairro, rua, numero, complemento, id_passageiro, id_motorista_id 
    from usuarios, passageiros, enderecos, corridas
    where id_usuario = id_usuario_id and id_passageiro = id_passageiro_id and id_usuario = usuario_id_usuario and data_corrida = '$data' and horario_ida= 'Nao volta'") or die ($conexao->error);

    echo "<p class='text-center my-5'>Exibindo informações da data $dia_escolhido/$mes_escolhido/2019, <a href='calendario.php'> altere o mês aqui</a> ou altere o dia selecionando no calendário acima.</p>";
    

?>
<h3 class="register-heading my-5 mx-auto" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 30PX; text-align: center;">Visualização dos dados de todos os passageiros</h3>



      
    </tr>
  </thead>
  <div class="col-md-12 register-right">
    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="Ida" aria-selected="true">Ida</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="Volta" aria-selected="false">Volta</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

   <?php while($dado = $consulta->fetch_array()){ ?>

    <table class="table my-5 table-bordered" style= "border;" >
    <thead class="thead-light">
      <tr>
        <th scope="col">Passageiros vão nessa data</th>
        <th scope="col">Sobrenome</th>
        <th scope="col">Rua</th>
        <th scope="col">Bairro</th>
        <th scope="col">Complemento</th>
      </tr>
    </thead>
  <tbody class="rounded-circle">
    <td scope="col"><?php echo $dado["nome"]; ?> </td>  
    <td><?php echo $dado["sobrenome"]; ?> </td>  
    <td><?php echo $dado["rua"]; ?> </td>  
    <td><?php echo $dado["bairro"]; ?> </td>  
    <td><?php echo $dado["complemento"]; ?> </td>  
   <?php } 

  while($dado = $consulta2->fetch_array()){ ?>

  <table class="table my-5 table-bordered" style= "border;" >
  <thead class="thead-light">
    <tr>
      <th scope="col">Passageiros que não vão nessa data</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Rua</th>
      <th scope="col">Bairro</th>
      <th scope="col">Complemento</th>
    </tr>
  </thead>
<tbody class="rounded-circle">
  <td scope="col"><?php echo $dado["nome"]; ?> </td>  
  <td><?php echo $dado["sobrenome"]; ?> </td>  
  <td><?php echo $dado["rua"]; ?> </td>  
  <td><?php echo $dado["bairro"]; ?> </td>  
  <td><?php echo $dado["complemento"]; ?> </td>  
 <?php }?>
</div>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<?php while($dado = $consulta3->fetch_array()){ ?>

  <table class="table my-5 table-bordered" style= "border;" >
  <thead class="thead-light">
    <tr>
      <th scope="col">Passageiros que voltam 17h nessa data</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Rua</th>
      <th scope="col">Bairro</th>
      <th scope="col">Complemento</th>
    </tr>
  </thead>
<tbody class="rounded-circle">
  <td scope="col"><?php echo $dado["nome"]; ?> </td>  
  <td><?php echo $dado["sobrenome"]; ?> </td>  
  <td><?php echo $dado["rua"]; ?> </td>  
  <td><?php echo $dado["bairro"]; ?> </td>  
  <td><?php echo $dado["complemento"]; ?> </td>  
 <?php } 

while($dado = $consulta4->fetch_array()){ ?>

  <table class="table my-5 table-bordered" style= "border;" >
  <thead class="thead-light">
    <tr>
      <th scope="col">Passageiros que voltam 12h nessa data</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Rua</th>
      <th scope="col">Bairro</th>
      <th scope="col">Complemento</th>
    </tr>
  </thead>
<tbody class="rounded-circle">
  <td scope="col"><?php echo $dado["nome"]; ?> </td>  
  <td><?php echo $dado["sobrenome"]; ?> </td>  
  <td><?php echo $dado["rua"]; ?> </td>  
  <td><?php echo $dado["bairro"]; ?> </td>  
  <td><?php echo $dado["complemento"]; ?> </td>  
 <?php } 

while($dado = $consulta5->fetch_array()){ ?>

  <table class="table my-5 table-bordered" style= "border;" >
  <thead class="thead-light">
    <tr>
      <th scope="col">Passageiros que não voltam nessa data</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Rua</th>
      <th scope="col">Bairro</th>
      <th scope="col">Complemento</th>
    </tr>
  </thead>
<tbody class="rounded-circle">
  <td scope="col"><?php echo $dado["nome"]; ?> </td>  
  <td><?php echo $dado["sobrenome"]; ?> </td>  
  <td><?php echo $dado["rua"]; ?> </td>  
  <td><?php echo $dado["bairro"]; ?> </td>  
  <td><?php echo $dado["complemento"]; ?> </td>  
 <?php } ?>
 </div>
 <?php


}else{
  MostreCalendarioCompleto();
}    
?>