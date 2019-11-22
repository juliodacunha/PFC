<?php

if(!isset($_SESSION['id'])){
    session_start();
}

$link = mysqli_connect("localhost", "root", "", "pfc");
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
    
    $query2 = "select id_corrida from usuarios, corridas 
    where id_usuario = usuario_id_usuario and data_corrida = '$data' and usuario_id_usuario = '$id_usuario'"; 
    $result2 = mysqli_query($conexao, $query2);
    $linha2 = mysqli_num_rows($result2);
    $rows2 = [];
    $linha2 = mysqli_fetch_assoc($result2);
    $rows2[] = $linha2;
    $id_corrida = $rows2[0]['id_corrida'];
   
    //Insercao de dados

    if(!empty($id_motora)){
        if(isset($id_corrida)){
            $queryDeletar = "DELETE from corridas where data_corrida = '$data' and usuario_id_usuario = '$id_usuario'";
            if (mysqli_query($conexao, $queryDeletar)) {
                echo '<div class="alert alert-primary" role="alert">';
                echo 'Seu antigo registro da corrida foi substitutido';
                echo '</div>';
            }
        }

        $sqlCorrida= "INSERT INTO corridas (usuario_id_usuario, motorista_id_motorista, data_corrida, horario_ida, horario_volta) VALUES ('$id_usuario', '$id_motora', '$data', '$ida', '$volta') ";

        if(mysqli_query($link, $sqlCorrida)){
            echo '<div class="alert alert-info" role="alert"> Informações registradas com sucesso! </div>';
        }else{
            echo "Error: " . $sqlCorrida . "<br>" .
            mysqli_error($link);
        }
    }else{
        echo '<div class="alert alert-danger" role="alert">';
        echo 'Você precisa ter um motorista responsável para ter uma corrida';
        echo '</div>';
    }

}else{}

// Fechar conexão
mysqli_close($link);
?>