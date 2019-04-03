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
<body>

<!-- PARTE DO LOGIN -->
<section class="pt-5 mb-5">
    <div class="container">
        <div class="wrapper fadeInDown align-self-center">
            <div id="formContent">

                <!-- Login -->
                <div class="fadeIn first">
                    <img src="img/logo.png" id="icon" alt="Icon" class="logo" style="" />
                </div>
                <form>
                    <div class="form-group">
                        <input type="email" id="login" class="fadeIn second" name="email" placeholder="email@email.com">
                        <input type="password" id="senha" class="fadeIn third" name="login" placeholder="******">
                        <input type="submit" class="fadeIn fourth" value="entrar">
                </form>

                <!-- Senha e registrar -->
                <div id="formFooter">
                    <small class="form-text text-muted"><a href="#">Esqueceu a senha?</a></small>
                    <small class="form-text text-muted"><a href="#">Nao possui conta?</a></small>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FIM DO LOGIN -->

<!-- CAROUSEL -->
<section>
    <div id="carouselIndex" class="carousel slide carousel-fade" data-ride="carousel1">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/carousel1.jpg" class="d-block w-100" style="height: 70%; width: 70%;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/carousel2.jpg" class="d-block w-100" style="height: 70%; width: 70%;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/carousel3.jpg" class="d-block w-100" style="height: 70%; width: 70%;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/carousel4.jpg" class="d-block w-100" style="height: 70%; width: 70%;" alt="...">
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
</section>
<!-- FIM DO CAROUSEL -->

<section class="mb-5">
    a
</section>



</body>
<?php include ("footer.php") ?>
</html>
