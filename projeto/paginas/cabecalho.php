<?php

include("../funcoes/Conexao.php");
require("head.php");
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['id'])){
$id_usuario = $_SESSION['id'];
//Código abaixo para verificar se o usuário é um motorista
$query = "select tipuser_tip_user from usuarios where id_usuario = '$id_usuario'"; 
$result = mysqli_query($conexao, $query);
$linha = mysqli_num_rows($result);
$rows = [];
$linha = mysqli_fetch_assoc($result);
$rows[] = $linha;
$tipo_usuario = $rows[0]['tipuser_tip_user'];

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
if(!isset($tipo_usuario)){
 echo' <li class="nav-item">
 <a class="nav-link active" href="perfil.php">Perfil</a>
</li>';
}
if(isset($tipo_usuario)){
if($tipo_usuario == 1){
    echo '
<li class="nav-item">
    <a class="nav-link active" href="perfil.php">Perfil</a>
</li>
<li class="nav-item">
    <a class="nav-link " href="calendario.php">Calendário</a>
</li>
<li class="nav-item">
    <a class="nav-link " href="van_passageiro.php">Sua van</a>
</li>

';
}

if($tipo_usuario == 2){
    echo '
<li class="nav-item">
<a class="nav-link active" href="perfil.php">Perfil</a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="passageiro_pelomot.php">Todos passageiros</a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="van_passageiro.php">Seus passageiros</a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="ver_passageiros.php">Presenças</a>
</li>
<li class="nav-item active">
<div class="dropdown show">
  <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Gerenciar contas
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="aprovar_motoristas.php">Aprovar motoristas</a>
    <a class="dropdown-item" href="aprovar_passageiros.php">Aprovar passageiros</a>
  </div>
</div>
</li>

    ';
}
}

?>
</ul>
<?php

if (isset($_SESSION['email'])) {
echo '<nav>
    <p>Bem vindo, '.$_SESSION['email']. '.</p>
    </nav>';
    ?>
    <a href="../funcoes/Logout.php" class="mb-3 ml-2" >Sair</a>
    <?php
}else{
    echo '<a style="float:right" href="../index.php">Faça o login</a>';
}
?>

</header>