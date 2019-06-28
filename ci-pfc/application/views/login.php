<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
                    <img src="<?php echo base_url(); ?>assets/images/logo.png" id="icon" alt="Icon" class="logo" style="" />
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
                    <small class="form-text text-muted"><?php echo anchor('Cadastro_usuario', 'Cadastre-se aqui'); ?></small


                </div>
            </div>
        </div>
    </div>
</section>
<!-- FIM DO LOGIN -->
</body>


</html>
