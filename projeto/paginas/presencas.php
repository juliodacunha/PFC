<?php
require("cabecalho.php");
require('../backend/calendario.php');
include('../backend/pagina_restrita.php');
pagina_motorista();
$id_usuario = $_SESSION['id'];
$query = "SELECT id_motorista FROM usuarios, motoristas WHERE id_usuario = $id_usuario AND user_iduser = id_usuario"; 
$result = mysqli_query($conexao, $query);
$linha = mysqli_num_rows($result);
$rows = [];
$linha = mysqli_fetch_assoc($result);
$rows[] = $linha;
$id_motorista = $rows[0]['id_motorista'];
?>
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
if($tipo_usuario!=2){
  header('Location: ../index.php');
}

if(isset($_GET['mes'])){
    $mes_escolhido = $_GET['mes'];
    $dia_escolhido = $_GET['dia'];
    $data_corrida = $dia_escolhido."/".$mes_escolhido;

    $sql = $conexao->query("SELECT nome, sobrenome, telefone, rua, numero, complemento, bairro 
    FROM usuarios, passageiros, enderecos, corridas
    WHERE id_usuario = usuario_id_usuario and id_usuario = id_usuario_id and id_passageiro = id_passageiro_id and data_corrida = '$data_corrida' and motorista_id_motorista = $id_motorista;");
    echo "<div class='mt-5'></div>";
    MostreCalendario($mes_escolhido);
    echo "<h3 class='register-heading mt-5 mx-auto' style='font-family: CustomFont; font-weight:normal; font-style:normal; font-size: 30PX; text-align: center;'>Passageiros de $data_corrida</h3>
    <p class='text-center'><a href='presencas.php'> Altere o mês aqui.</a></p>";
    ?>
    <form method='post' action='calendario.php' class='mx-auto'>

    </form>   
    <div class='container'>
      <table class='table'>
        <thead>
            <tr>
              <th scope='col' >Nome</th>
              <th scope='col'>Sobrenome</th>
              <th scope='col'>Telefone</th>
              <th scope='col'>Rua</th>
              <th scope='col'>Número</th>
              <th scope='col'>Complemento</th>
              <th scope='col'>Bairro</th>
            </tr>
          </thead>
        <?php 
        while($dado = $sql->fetch_array()){ 
        echo "
        <tbody>
          <td>".$dado['nome']."  </td>  
          <td>".$dado['sobrenome']."  </td>  
          <td>".$dado['telefone']."  </td>  
          <td>".$dado['rua']."  </td>  
          <td>".$dado['numero']."  </td>  
          <td>".$dado['complemento']."  </td>  
          <td>".$dado['bairro']."  </td> 
        </tbody>
      </table>
    </div>
    ";
      }

}else{
    MostreCalendarioCompleto();
}
?>