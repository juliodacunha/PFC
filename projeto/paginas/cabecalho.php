<?php
require("../backend/Conexao.php");
require("head.php");
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['id'])){
  $id_usuario = $_SESSION['id'];
  //Código abaixo para verificar se o usuário é um motorista
  $query = "select tipuser_tip_user, nome, sobrenome from usuarios where id_usuario = '$id_usuario'"; 
  $result = mysqli_query($conexao, $query);
  $linha = mysqli_num_rows($result);
  $rows = [];
  $linha = mysqli_fetch_assoc($result);
  $rows[] = $linha;
  $tipo_usuario = $rows[0]['tipuser_tip_user'];
  $nomesobrenome = $rows[0]['nome'].' '.$rows[0]['sobrenome'];
}
?>

<body>
  <header>
    <!-- Menu -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f6f6f6">
      <a class="navbar-brand" href="#"><img src="../img/logo.png" id="icon" alt="Icon" class="logo" style="width: 100px; height: 100px;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">        
          <?php
          if(!isset($tipo_usuario)){ ?>
          <li class="nav-item">
          <a class="nav-link active" href="perfil.php">Perfil</a>
          </li>
          <?php }
          if(isset($tipo_usuario)){
          if($tipo_usuario == 1){
          ?>
          <li class="nav-item">
              <a class="nav-link active" href="perfil.php">Perfil</a>
          </li>
          <li class="nav-item">
              <a class="nav-link " href="calendario.php">Calendário</a>
          </li>
          <li class="nav-item">
              <a class="nav-link " href="ver_minhavan.php">Minha van</a>
          </li>

          <?php }
          if($tipo_usuario == 2){ ?>

          <li class="nav-item">
          <a class="nav-link active" href="perfil.php">Perfil</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" href="passageiro_pelomot.php">Todos passageiros</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" href="van_passageiro.php">Seus passageiros</a>
          </li>
          <div class="dropdown show">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Gerenciar contas
            </a>
          <li>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="aprovar_motoristas.php">Aprovar motoristas</a>
              <a class="dropdown-item" href="aprovar_passageiros.php">Aprovar passageiros</a>
            </div>
          </li>
          </div>
          <li class="nav-item active">
            <div class="dropdown show">
              <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Calendário de presença 
              </a>
            
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="ver_passageiros.php">Dos seus passageiro</a>
              <a class="dropdown-item" href="ver_todospassageiros.php">De todos os passageiros</a>
            </div>
          </div>
          </li>
          <?php 
          }
        } ?>
        </ul>
        <?php
        if (isset($_SESSION['id'])) { ?>
        <ul class="navbar-nav">
          <li class="nav-item active">
            <div class="dropdown show mr-3">
              <p class="nav-link dropdown-toggle my-0 py-0" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Olá, <?php echo $nomesobrenome; ?>
              </p>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="../backend/Logout.php">Sair</a>
              </div>
            </div>
          </li>
        </ul>
        <?php 
        }else{
            echo '<a href="../index.php">Faça o login</a>';
        }
        ?>
      </div>
  </header>
