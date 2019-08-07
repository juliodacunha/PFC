<html lang="en">
<head>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="includes/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <!-- JS -->
    <script src="includes/bootstrap/js/bootstrap.min.js"></script>


    <meta charset="utf-8">
</head>
<header>
    <!-- Menu -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f6f6f6">
        <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>assets/images/logo.png" id="icon" alt="Icon" class="logo" style="width: 100px; height: 100px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url()?>" >Página Inicial <span class="sr-only">Página inicial</span></a>
                </li>
                <li class="nav-item">
                <?php echo anchor('Pagina_usuario', 'seu perfil', array('class' => 'nav-link')  ); ?>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Empresas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Suas Atividades</a>
                        <a class="dropdown-item" href="#">Atividade Financeira</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Empresas cadastratadas</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Sobre nós</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="A procura de algo..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busca</button>
            </form>
        </div>
    </nav>
</header>