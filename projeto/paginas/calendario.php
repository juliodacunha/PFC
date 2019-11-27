<?php
include('../backend/Verifica_login.php');
require('head.php');
require('cabecalho.php');
require('../backend/calendario.php');
require('../backend/dados_corrida.php');

?>


<h3 class="register-heading my-5 mx-auto" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 30PX; text-align: center;">Selecione a data a ser alterada </h3>

<?php


if(isset($_GET['mes'])){
    $mes_escolhido = $_GET['mes'];
    $dia_escolhido = $_GET['dia'];
    
    MostreCalendario($mes_escolhido);
    echo "<p class='text-center my-5'>Você seleciou a data $dia_escolhido/$mes_escolhido/2019, <a href='calendario.php'> altere o mês aqui.</a></p>";
    ?>
    <form method='post' action='calendario.php' class='mx-auto'>
        <div class='container'>
            <div class='row'>
                <div class='col' id='radio-1'>
                    <h4>Ida</h4>
                    <div class='custom-control custom-radio'>
                        <input type='hidden' name='dia' value='<?php echo $dia_escolhido; ?>' />
                        <input type='hidden' name='mes' value='<?php echo $mes_escolhido; ?>' />
                        <input type='radio' id='radio1' name='ida' class='custom-control-input' value='Vai' checked>
                        <label class='custom-control-label' for='radio1'>Vou de van</label>
                    </div>
                    <div class='custom-control custom-radio'>
                        <input type='radio' id='radio2' name='ida' class='custom-control-input' value='Nao vai'>
                        <label class='custom-control-label' for='radio2'>Não vou de van</label>
                    </div>
                </div>
                <div class='col' id='radio-2'>
                    <h4>Volta</h4>
                    <div class='custom-control custom-radio'>
                        <input type='radio' id='radio3' name='volta' class='custom-control-input' value='Volta 12h'>
                        <label class='custom-control-label' for='radio3'>Volto 12h</label>
                    </div>
                    <div class='custom-control custom-radio'>
                        <input type='radio' id='radio4' name='volta' class='custom-control-input' value='Volta 17h' checked>
                        <label class='custom-control-label' for='radio4'>Volto 17h</label>
                    </div>
                    <div class='custom-control custom-radio'>
                        <input type='radio' id='radio5' name='volta' class='custom-control-input' value='Nao volta'>
                        <label class='custom-control-label' for='radio5'>Não volto de van</label>
                    </div>
                </div>
                <div class='row justify-content-md-center' id='radio-2'>
                    <input type='submit' class='btnRegister' style='float: right' name='submit' value='Enviar'/>
                </div>
            </div>
        </div>
    </form>   
    
<?php
}else{
    MostreCalendarioCompleto();
} ?>

<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>