<?php
if(!isset($_SESSION)){
session_start();
}

$link = mysqli_connect("localhost", "aluno", "aluno", "pfc");
if($link === false){
    die("ERROR: Não pôde conectar. " . mysqli_connect_error());
}

if(isset($_POST['submit'])){
    //Tabela usuario (padrao)
    $nome = mysqli_real_escape_string($link, $_REQUEST['nome']);
    $sobrenome = mysqli_real_escape_string($link, $_REQUEST['sobrenome']);
    $senha = md5(mysqli_real_escape_string($link, $_REQUEST['senha']));
    $rg = mysqli_real_escape_string($link, $_REQUEST['rg']);
    $cpf = mysqli_real_escape_string($link, $_REQUEST['cpf']);
    $email = mysqli_real_escape_string($link, $_REQUEST['email']);
    $telefone = mysqli_real_escape_string($link, $_REQUEST['telefone']);
    $sexo = mysqli_real_escape_string($link, $_REQUEST['sexo']);
    //Tabela do motorista
    $cnh = mysqli_real_escape_string($link, $_REQUEST['cnh']);

    //Insercao de dados
    $sqlMotorista = "INSERT INTO usuarios (tipuser_tip_user, cpf, rg, email, nome, sobrenome, sexo, telefone, senha) VALUES (2, '$cpf', '$rg', '$email', '$nome', '$sobrenome', '$sexo', '$telefone', '$senha')";

    $sql4 = "INSERT INTO motoristas (emp_idempresa, user_iduser, cnh, ativo) VALUES ('1', last_insert_id(), '$cnh', '1')";

    if(strlen($rg) >= 7 AND strlen($cpf) >= 11 AND strlen($cnh) >= 10){
        if(mysqli_query($link, $sql4)){
            if(mysqli_query($link, $sqlMotorista)){
                echo "Registrado";
            }
        }
    }else{
        if(strlen($rg<=7)){
            echo "Cadastro não realizado, erro no RG <BR>";
        }
        if(strlen($cpf<=11)){
            echo "Cadastro não realizado, erro no CPF <BR>";
        }
        if(strlen($cnh<=10)){
            echo "Cadastro não realizado, erro no CNH <BR>";
        }
        if(isset($sexo)){
            echo "Cadastro não realizado, erro no sexo <BR>";
        }
    }
    

}elseif(isset($_POST['registrar'])){
    //Tabela usuario (padrao)
    $nome = mysqli_real_escape_string($link, trim($_REQUEST['nome']));
    $sobrenome = mysqli_real_escape_string($link, trim($_REQUEST['sobrenome']));
    $senha = md5(mysqli_real_escape_string($link, trim($_REQUEST['senha'])));
    $rg = mysqli_real_escape_string($link, trim($_REQUEST['rg']));
    $cpf = mysqli_real_escape_string($link, trim($_REQUEST['cpf']));
    $email = mysqli_real_escape_string($link, trim($_REQUEST['email']));
    $telefone = mysqli_real_escape_string($link, trim($_REQUEST['telefone']));
    $sexo = mysqli_real_escape_string($link, trim($_REQUEST['sexo']));

    //Tabela endereco (apenas passageiro)
    $cep = mysqli_real_escape_string($link, trim($_REQUEST['cep']));
    $rua = mysqli_real_escape_string($link, trim($_REQUEST['rua']));
    $numero = mysqli_real_escape_string($link, trim($_REQUEST['numero']));
    $complemento = mysqli_real_escape_string($link, trim($_REQUEST['complemento']));
    $bairro = mysqli_real_escape_string($link, trim($_REQUEST['bairro']));
    $cidade = mysqli_real_escape_string($link, trim($_REQUEST['cidade']));
    $estado = mysqli_real_escape_string($link, trim($_REQUEST['estado']));

    //Tabela passageiro (apenas passageiro)
    $turma = mysqli_real_escape_string($link, trim($_REQUEST['turma']));
    $curso = mysqli_real_escape_string($link, trim($_REQUEST['curso']));
    $matricula = mysqli_real_escape_string($link, trim($_REQUEST['matricula']));

    if(strlen($rg) >= 7 AND strlen($cpf) >= 11 AND strlen($cnh) >= 10){
        if(mysqli_query($link, $sql4)){
            if(mysqli_query($link, $sqlMotorista)){
                echo "Registrado";
            }
        }
    }else{

        //Insercao de dados
        $sql = "INSERT INTO usuarios (tipuser_tip_user, cpf, rg, email, nome, sobrenome, sexo, telefone, senha) 
        VALUES (1, '$cpf', '$rg', '$email', '$nome', '$sobrenome', '$sexo', '$telefone', '$senha')";
        $sql2 = "INSERT INTO passageiros (emp_cod_empresa, id_usuario_id, turma, curso, matricula) 
        VALUES ('1', last_insert_id(), '$turma', '$curso', '$matricula')";
        $sql3 = "INSERT INTO enderecos (id_passageiro_id, cep, rua, numero, complemento, bairro, cidade, estado) 
        VALUES (last_insert_id(), '$cep', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$estado')";
        mysqli_query($link, $sql);
        //echo $sql."<br>";

        if(strlen($rg) >= 7 AND strlen($cpf) >= 11 AND strlen($cnh) >= 10 AND strlen($cep) >= 8 AND strlen($estado) >= 2){
            if(mysqli_query($link, $sql)){
                if(mysqli_query($link, $sql2)){
                    if(mysqli_query($link, $sql3)){
                        echo "Registrado";
                    }
                }
            }
        
        }else{
            if(strlen($rg<=7)){
                echo "Cadastro não realizado, erro no RG <BR>";
            }
            if(strlen($cpf<=11)){
                echo "Cadastro não realizado, erro no CPF <BR>";
            }
            if(isset($sexo)){
                echo "Cadastro não realizado, erro no sexo <BR>";
            }
            if(strlen($cep<=1)){
                echo "Cadastro não realizado, erro no CEP <BR>";
            }
            if(strlen($estado<=11)){
                echo "Cadastro não realizado, erro no estado <BR>";
            }
        }  
    }
}




// Fechar conexão
mysqli_close($link);
?>