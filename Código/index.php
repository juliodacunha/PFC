<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de vans</title>

    <!-- CSS do Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- JS Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
</head>
<body>

<!-- PARTE DO LOGIN --!>
<div class="container">
    <div class="wrapper fadeInDown align-self-center">
        <div id="formContent">
            <!-- Login -->
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
<!-- FIM DO LOGIN --!>

<!-- CAROUSEL --!>



</body>
<?php include ("footer.php") ?>
</html>
