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
                         <a href="index2.php"><input type="submit" class="fadeIn fourth" value="entrar"></a>
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
</body>
  <!-- Footer -->
  <?php include ("footer.php") ?>

</html>
