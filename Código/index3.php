<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de vans</title>

    <!-- CSS do Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- JS Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" href="img/logo.png">
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



<div id="carousel-index" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-index" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-index" data-slide-to="1"></li>
        <li data-target="#carousel-index" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item slide1 active">
            <div class="carousel-caption d-none d-md-block">
                <h3></h3>
            </div>
        </div>
        <div class="carousel-item slide2">
            <div class="carousel-caption d-none d-md-block">
                <h3></h3>
            </div>
        </div>
        <div class="carousel-item slide3">
            <div class="carousel-caption d-none d-md-block">
                <h3></h3>
            </div>
        </div>

    </div>
    <a class="carousel-control-prev" href="#carousel-index" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-index" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Carousel
<div id="carousel-fade" class="carousel carousel-fade" data-ride="carousel" data-interval="2000">
    <ol class="carousel-indicators">
        <li data-target="#carousel-fade" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-fade" data-slide-to="1"></li>
        <li data-target="#carousel-fade" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner embed-responsive embed-responsive-21by9" role="listbox">
        <div class="carousel-item embed-responsive-item active">
            <img src="img/carousel1.jpg" alt="First slide image" class="img-fluid">
            <div class="carousel-caption">
                <h3>First slide Heading</h3>
                <p>First slide Caption</p>
            </div>
        </div>

        <div class="carousel-item embed-responsive-item">
            <img src="img/carousel2.jpg" alt="Second slide image" class="img-fluid">
            <div class="carousel-caption">
                <h3>Second slide Heading</h3>
                <p>Second slide Caption</p>
            </div>
        </div>

        <div class="carousel-item embed-responsive-item">
            <img src="img/carousel3.jpg" alt="Third slide image" class="img-fluid">
            <div class="carousel-caption">
                <h3>Third slide Heading</h3>
                <p>Third slide Caption</p>
            </div>
        </div>

    </div>
    <a class="carousel-control-prev" href="#carousel-fade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-fade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
-->


<!-- Informaçoes -->
<section class="">
<div class="process">
    <div class="process-row">
        <div class="process-step">
            <button type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-user fa-3x"></i></button>
            <p>Organizaçao</p>
        </div>
        <div class="process-step">
            <button type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-comments-o fa-3x"></i></button>
            <p>Rapida comunicaçao</p>
        </div>
        <div class="process-step">
            <button type="button" class="btn btn-success btn-circle" disabled="disabled"><i class="fa fa-eur fa-3x"></i></button>
            <p>Agilidade</p>
        </div>
    </div>
</div>
</section>

</body>
<?php include ("footer.php") ?>
</html>
