<?php

include("../funcoes/Conexao.php");
require("head.php");

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
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php" >Página Inicial <span class="sr-only">Página inicial</span></a>
                </li>
                <li class="nav-item">
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Empresas
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#" >Suas Atividades</a>
        <a class="dropdown-item" href="#">Atividade Financeira</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Empresas cadastratadas</a>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link disabled" href="#">Sobre nós</a>
</li>
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