<?php include ("header.php") ?>

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
            <a href="#" style="text-decoration: none; color: black;"><button type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-user fa-3x"></i></button>
            <p>Login</p></a>
        </div>        
        <div class="process-step">
            <a href="#" style="text-decoration: none; color: black;"><button type="button" class="btn btn-default btn-circle ml-5" disabled="disabled"><i class="fas fa-user-cog fa-3x"></i></button>
            <p class="ml-5">Página do usuário</p></a>
        </div>
        <div class="process-step">
            <a href="#" style="text-decoration: none; color: black;"><button type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa fa-registered fa-3x"></i></button>
            <p>Registre-se</p></a>
        </div>

    </div>
</div>
</section>

</body>
<?php include ("footer.php") ?>
</html>
