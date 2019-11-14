<?php

if(!isset($_SESSION['id'])){
    session_start();
}

$link = mysqli_connect("localhost", "aluno", "aluno", "pfc");
if($link === false){
    die("ERROR: Não pôde conectar. " . mysqli_connect_error());
}


if(isset($_SESSION['id'])){
    $id_usuario = $_SESSION['id'];
}    

if(isset($_POST['submit'])){
    //Tabela usuario (padrao)
    $ida = mysqli_real_escape_string($link, $_REQUEST['ida']);
    $volta = mysqli_real_escape_string($link, $_REQUEST['volta']);
    $dia = mysqli_real_escape_string($link, $_REQUEST['dia']);
    $mes = mysqli_real_escape_string($link, $_REQUEST['mes']);
    $data = $dia.'/'.$mes;
    $query = "select id_motorista_id from motoristas, passageiros, usuarios where id_motorista = id_motorista_id and id_usuario = id_usuario_id and id_usuario_id = '$id_usuario'"; 
    $result = mysqli_query($conexao, $query);
    $linha = mysqli_num_rows($result);
    $rows = [];
    $linha = mysqli_fetch_assoc($result);
    $rows[] = $linha;
    $id_motora = $rows[0]['id_motorista_id'];
   
    //Insercao de dados
    $sqlCorrida= "INSERT INTO corridas (usuario_id_usuario, motorista_id_motorista, veiculo_id_veiculo, data_corrida, horario_ida, horario_volta) VALUES ('$id_usuario', '$id_motora', 1, '$data', '$ida', '$volta') ";



    if(mysqli_query($link, $sqlCorrida)){
        echo '<div class="alert alert-light" role="alert"> Informações registradas com sucesso! </div>';
    }else{
        echo "Error: " . $sqlCorrida . "<br>" .
        mysqli_error($link);
    }

}else{}




// Fechar conexão
mysqli_close($link);
?>