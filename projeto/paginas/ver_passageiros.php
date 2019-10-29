<?php
require("head.php");
require("cabecalho.php");
require("../funcoes/calendario.php");
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
if($tipo_usuario!=2){
  header('Location: ../index.php');
}
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
    MostreCalendario($mes_escolhido);
    echo "<p class='text-center my-5'>Exibindo informações da data $dia_escolhido/$mes_escolhido/2019, <a href='calendario.php'> altere o mês aqui</a> ou altere o dia selecionando no calendário acima.</p>";
    echo '

  <table class="table my-5 table-bordered" style= "border;" >
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Passageiros que não vão nessa data</th>
        <th scope="col">Seu endereço</th>
        <th scope="col">Complemento</th>
        <th scope="col">Seu motorista</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>    
        <td>@mdo</td>            
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        <td>@mdo</td>
      </tr>
    </tbody>
  </table>

  <table class="table my-5 table-bordered">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Passageiros que retornam às 12:00</th>
        <th scope="col">Seu endereço</th>
        <th scope="col">Complemento</th>
        <th scope="col">Seu motorista</th>       
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        <td>@mdo</td>
      </tr>
    </tbody>
  </table>

  <table class="table my-5 table-bordered">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Passageiros que retornam às 17:00</th>
        <th scope="col">Seu endereço</th>
        <th scope="col">Complemento</th>
        <th scope="col">Seu motorista</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        <td>@mdo</td>
      </tr>
    </tbody>
  </table>

  
  
';

}else{
    MostreCalendarioCompleto();
}

?>


</div>
