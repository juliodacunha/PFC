<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de vans</title>

    <!-- CSS do Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- JS Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<header>
    <!-- Menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="img/logo.png" id="icon" alt="Icon" class="logo" style="width: 100px; height: 100px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Página Inicial <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Seu Perfil</a>
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
<body>

<section>
    <div id="carouselIndex" class="carousel slide carousel-fade" data-ride="carousel1">

        <div class="carousel-inner">

            <div class="carousel-item active">

                <img src="img/carousel1.jpg" class="d-block w-100" style="height: 80%; width: 80%;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/carousel2.jpg" class="d-block w-100" style="height: 80%; width: 80%;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/carousel3.jpg" class="d-block w-100" style="height: 80%; width: 80%;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/carousel4.jpg" class="d-block w-100" style="height: 80%; width: 80%;" alt="...">
            </div>
        </div>

        <a class="carousel-control-prev" href="#carouselIndex" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselIndex" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</body>
<?php include ("footer.php") ?>
</html>
