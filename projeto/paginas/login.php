<?php
error_reporting();
require("head.php");
require("cabecalho.php");
require("../backend/Login.php");
if(isset($_SESSION['email'])){
    header('Location: perfil.php');
    exit();
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>

<!-- PARTE DO LOGIN -->
<section class="pt-5 mb-5">
    <div class="container">
        <div class="wrapper fadeInDown align-self-center">
            <div id="formContent">

                <!-- Login -->
                <div class="fadeIn first">
                    <img src="../img/logo.png" id="icon" alt="Icon" class="logo" style="" />
                    <h4 class="register-heading my-1 mx-auto" style=" font-family: 'CustomFont';  font-weight:normal; font-style:normal; font-size:40PX; text-align: center;"> Login </h3>

                </div>
                <form action="login.php" method="POST"> 
                    <div class="form-group">
                        <input type="email" id="email" class="fadeIn second" name="email" placeholder="email@email.com">
                        <input type="password" id="senha" class="fadeIn third" name="senha" placeholder="******">
                        <input type="submit" class="fadeIn fourth" value="entrar" name="logar">
                </form>
            
                <!-- Senha e registrar -->
                <div id="formFooter">
                    <small class="form-text text-muted"><a href="cadastro_usuario.php">Não possui uma conta?</a></small>
                    <small class="form-text text-muted"><a href="#">Esqueceu a senha?</a></small>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FIM DO LOGIN -->
</body>

