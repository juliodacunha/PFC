<?php
session_start();
error_reporting(0);

$link = mysqli_connect("localhost", "root", "", "pfc");
if($link === false){
    die("ERROR: Não pôde conectar. " . mysqli_connect_error());
}

//Tabela usuario (padrao)
$nome = mysqli_real_escape_string($link, $_REQUEST['nome']);
$sobrenome = mysqli_real_escape_string($link, $_REQUEST['sobrenome']);
$senha = md5(mysqli_real_escape_string($link, $_REQUEST['senha']));
$rg = mysqli_real_escape_string($link, $_REQUEST['rg']);
$cpf = mysqli_real_escape_string($link, $_REQUEST['cpf']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$telefone = mysqli_real_escape_string($link, $_REQUEST['telefone']);
$sexo = mysqli_real_escape_string($link, $_REQUEST['sexo']);

//Tabela endereco (apenas passageiro)
$cep = mysqli_real_escape_string($link, $_REQUEST['cep']);
$rua = mysqli_real_escape_string($link, $_REQUEST['rua']);
$numero = mysqli_real_escape_string($link, $_REQUEST['numero']);
$complemento = mysqli_real_escape_string($link, $_REQUEST['complemento']);
$bairro = mysqli_real_escape_string($link, $_REQUEST['bairro']);
$cidade = mysqli_real_escape_string($link, $_REQUEST['cidade']);
$estado = mysqli_real_escape_string($link, $_REQUEST['estado']);

//Tabela passageiro (apenas passageiro)
$turma = mysqli_real_escape_string($link, $_REQUEST['turma']);
$curso = mysqli_real_escape_string($link, $_REQUEST['curso']);
$matricula = mysqli_real_escape_string($link, $_REQUEST['matricula']);

//Tabela do motorista
$cnh = mysqli_real_escape_string($link, $_REQUEST['cnh']);

//Insercao de dados
$sql = "INSERT INTO usuarios (tipuser_tip_user, cpf, rg, email, nome, sobrenome, sexo, telefone, senha) VALUES (1, '$cpf', '$rg', '$email', '$nome', '$sobrenome', '$sexo', '$telefone', '$senha')";
mysqli_query($link, $sql);
$sql4 = "INSERT INTO motoristas (emp_idempresa, user_iduser, cnh, ativo) VALUES ('1', last_insert_id(), '$cnh', '1')";
mysqli_query($link, $sql4);
$sql2 = "INSERT INTO passageiros (id_usuario_id, emp_cod_empresa, turma, curso, matricula) VALUES (last_insert_id(), '1', '$turma', '$curso', '$matricula')";
mysqli_query($link, $sql2);
$sql3 = "INSERT INTO enderecos (id_passageiro_id, cep, rua, numero, complemento, bairro, cidade, estado) VALUES (last_insert_id(), '$cep', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$estado')";
mysqli_query($link, $sql3);

if(mysqli_query($link, $sql4)){
    echo "Registrado";
}elseif(mysqli_query($link, $sql3)){
    echo "Registrado";
}elseif(mysqli_query($link, $sql2)){
    echo "Registrado";
}elseif(mysqli_query($link, $sql)){
    echo "Registrado";
}else{
    //echo "Error: " . $sql4 . "<br>" .
    //mysqli_error($link);
}

// Fechar conexão
mysqli_close($link);
?>