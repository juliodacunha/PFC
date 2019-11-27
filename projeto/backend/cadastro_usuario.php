<?php
if(!isset($_SESSION)){
    session_start();
}
$link = mysqli_connect("localhost", "root", "", "pfc");
if($link === false){
    die("ERROR: Não pôde conectar. " . mysqli_connect_error());
}

if(isset($_POST['submit'])){
    //Tabela usuario (padrao)
    $nome = mysqli_real_escape_string($link, ucfirst($_REQUEST['nome']));
    $sobrenome = mysqli_real_escape_string($link, ucfirst($_REQUEST['sobrenome']));
    $senha = md5(mysqli_real_escape_string($link, $_REQUEST['senha']));
    $rg = mysqli_real_escape_string($link, $_REQUEST['rg']);
    $cpf = mysqli_real_escape_string($link, $_REQUEST['cpf']);
    $email = mysqli_real_escape_string($link, $_REQUEST['email']);
    $telefone = mysqli_real_escape_string($link, $_REQUEST['telefone']);
    $sexo = mysqli_real_escape_string($link, $_REQUEST['sexo']);
    //Pega o nome da imagem
    $image = $_FILES['foto']['name'];
    //Diretório da imagem
    $target = "../img/usuarios/";
    $temp = explode(".", $_FILES["foto"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);

    //Tabela do motorista
    $cnh = mysqli_real_escape_string($link, $_REQUEST['cnh']);

    //Insercao de dados
    $sqlMotorista = "INSERT INTO usuarios (tipuser_tip_user, cpf, rg, email, nome, sobrenome, sexo, telefone, senha, imagem) VALUES (2, '$cpf', '$rg', '$email', '$nome', '$sobrenome', '$sexo', '$telefone', '$senha', '$newfilename')";
    $sql4 = "INSERT INTO motoristas (emp_idempresa, user_iduser, cnh, ativo) VALUES ('1', last_insert_id(), '$cnh', '1')";
    
    $erro = 0;
    $contador = 0;
    if(1 === preg_match('~[0-9]~', $nome)){
        echo '<div class="alert alert-danger" role="alert">';
        echo "O nome não pode conter números <br>";
        echo '</div';  
        $erro = 1;
        
    }
    if(1 === preg_match('~[0-9]~', $sobrenome)){
        echo '<div class="alert alert-danger" role="alert">';
        echo "O sobrenome não pode conter números <br>";
        echo '</div';  
        $erro = 1;
        
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    }else{
        $erro = 1;
        echo '<div class="alert alert-danger" role="alert">';
        echo "Email inválido <br>";
        echo '</div';  
    }
    if(1 === preg_match('/[A-Za-z]/', $cnh)){
        $erro = 1;
        
        echo '<div class="alert alert-danger" role="alert">';
        echo "O CNH não pode conter letras <br>";   
        echo '</div';   
    }
    if(1 === preg_match('/[A-Za-z]/', $rg)){
        $erro = 1;
        
        echo '<div class="alert alert-danger" role="alert">';
        echo "O RG não pode conter letras <br>";  
        echo '</div';    
    }
    if(1 === preg_match('/[A-Za-z]/', $cpf)){
        $erro = 1;
        
        echo '<div class="alert alert-danger" role="alert">';
        echo "O CPF não pode conter letras <br>";   
        echo '</div';   
    }
    if(1 === preg_match('/[A-Za-z]/', $telefone)){
        $erro = 1;
        
        echo '<div class="alert alert-danger" role="alert">';
        echo "O telefone não pode conter letras <br>";    
        echo '</div';  
    }
    if($erro!=1){  
        if(mysqli_query($link, $sqlMotorista)){
            if(mysqli_query($link, $sql4)){
                move_uploaded_file($_FILES['foto']['tmp_name'], $target.$newfilename);
                echo "<div class='alert alert-success' role='alert'>
                    Registrado! Aguarde a aprovação de sua conta.
                  </div>";
                    header('refresh: 5; url=login.php');
            }
        }
    }
}elseif(isset($_POST['registrar'])){
    //Tabela usuario (padrao)
    $nome = mysqli_real_escape_string($link, ucfirst($_REQUEST['nome']));
    $sobrenome = mysqli_real_escape_string($link, ucfirst($_REQUEST['sobrenome']));
    $senha = md5(mysqli_real_escape_string($link, trim($_REQUEST['senha'])));
    $rg = mysqli_real_escape_string($link, trim($_REQUEST['rg']));
    $cpf = mysqli_real_escape_string($link, trim($_REQUEST['cpf']));
    $email = mysqli_real_escape_string($link, trim($_REQUEST['email']));
    $telefone = mysqli_real_escape_string($link, trim($_REQUEST['telefone']));
    $sexo = mysqli_real_escape_string($link, trim($_REQUEST['sexo']));
    //Pega o nome da imagem
    $image = $_FILES['foto']['name'];
    //Diretório da imagem
    $target = "../img/usuarios/";
    $temp = explode(".", $_FILES["foto"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);

    //Tabela endereco (apenas passageiro)
    $cep = mysqli_real_escape_string($link, trim($_REQUEST['cep']));
    $rua = mysqli_real_escape_string($link, ucfirst($_REQUEST['rua']));
    $numero = mysqli_real_escape_string($link, trim($_REQUEST['numero']));
    $complemento = mysqli_real_escape_string($link, ucfirst($_REQUEST['complemento']));
    $bairro = mysqli_real_escape_string($link, ucfirst($_REQUEST['bairro']));
    $cidade = mysqli_real_escape_string($link, ucfirst($_REQUEST['cidade']));
    $estado = mysqli_real_escape_string($link, ucfirst($_REQUEST['estado']));
    //Tabela passageiro (apenas passageiro)
    $turma = mysqli_real_escape_string($link, trim($_REQUEST['turma']));
    $curso = mysqli_real_escape_string($link, ucfirst($_REQUEST['curso']));
    $matricula = mysqli_real_escape_string($link, trim($_REQUEST['matricula']));
    //Insercao de dados
    $sql = "INSERT INTO usuarios (tipuser_tip_user, cpf, rg, email, nome, sobrenome, sexo, telefone, senha, imagem) 
    VALUES (1, '$cpf', '$rg', '$email', '$nome', '$sobrenome', '$sexo', '$telefone', '$senha', '$newfilename')";
    $sql2 = "INSERT INTO passageiros (emp_cod_empresa, id_usuario_id, turma, curso, matricula) 
    VALUES ('1', last_insert_id(), '$turma', '$curso', '$matricula')";
    $sql3 = "INSERT INTO enderecos (id_passageiro_id, cep, rua, numero, complemento, bairro, cidade, estado) 
    VALUES (last_insert_id(), '$cep', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$estado')";
    //echo $sql."<br>";
    $erro = 0;
    $contador = 0;
    if(1 === preg_match('~[0-9]~', $nome)){
        echo '<div class="alert alert-danger" role="alert">';
        echo "O nome não pode conter números <br>";
        echo '</div';  
        $erro = 1;
        
    }
    if(1 === preg_match('~[0-9]~', $sobrenome)){
        echo '<div class="alert alert-danger" role="alert">';
        echo "O sobrenome não pode conter números <br>";
        echo '</div';  
        $erro = 1;
        
    }
    if(1 === preg_match('~[0-9]~', $bairro)){
        $erro = 1;
        
        echo '<div class="alert alert-danger" role="alert">';
        echo "O bairro não pode conter números <br>";
        echo '</div';  
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    }else{
        $erro = 1;
        echo '<div class="alert alert-danger" role="alert">';
        echo "Email inválido <br>";
        echo '</div';  
    }
    if(1 === preg_match('~[0-9]~', $cidade)){
        $erro = 1;
        
        echo '<div class="alert alert-danger" role="alert">';
        echo "A cidade não pode conter números <br>";
        echo '</div';  
    }
    if(1 === preg_match('~[0-9]~', $estado)){
        $erro = 1;
        
        echo '<div class="alert alert-danger" role="alert">';
        echo "O estado não pode conter números <br>";
        echo '</div';  
    }
    if(1 === preg_match('~[0-9]~', $curso)){
        $erro = 1;
        
        echo '<div class="alert alert-danger" role="alert">';
        echo "O curso não pode conter números <br>";   
        echo '</div';   
    }
    if(1 === preg_match('/[A-Za-z]/', $rg)){
        $erro = 1;
        
        echo '<div class="alert alert-danger" role="alert">';
        echo "O RG não pode conter letras <br>";  
        echo '</div';    
    }
    if(1 === preg_match('/[A-Za-z]/', $cpf)){
        $erro = 1;
        
        echo '<div class="alert alert-danger" role="alert">';
        echo "O CPF não pode conter letras <br>";   
        echo '</div';   
    }
    if(1 === preg_match('/[A-Za-z]/', $cep)){
        $erro = 1;
        
        echo '<div class="alert alert-danger" role="alert">';
        echo "O CEP não pode conter letras <br>";    
        echo '</div';  
    }
    if(1 === preg_match('/[A-Za-z]/', $numero)){
        $erro = 1;
        
        echo '<div class="alert alert-danger" role="alert">';
        echo "O número de residência não pode conter letras <br>";   
        echo '</div';   
    }
    if(1 === preg_match('/[A-Za-z]/', $telefone)){
        $erro = 1;
        
        echo '<div class="alert alert-danger" role="alert">';
        echo "O telefone não pode conter letras <br>";    
        echo '</div';  
    }
    if(1 === preg_match('/[A-Za-z]/', $matricula)){
        $erro = 1;
        
        echo '<div class="alert alert-danger" role="alert">';
        echo "A matrícula não pode conter letras <br>"; 
        echo '</div';   
    }
    if($erro!=1){  
        if(mysqli_query($link, $sql)){
            if(mysqli_query($link, $sql2)){
                if(mysqli_query($link, $sql3)){ 
                    move_uploaded_file($_FILES['foto']['tmp_name'], $target.$newfilename);
                    echo "<div class='alert alert-success' role='alert'>
                    Registrado! Aguarde a aprovação de sua conta.
                    </div>";
                    header('refresh: 5; url=login.php');
                }
            }
        } 
    }else{
        echo "Tente se cadastrar novamente. <br>";
    }  
}
        
    
// Fechar conexão
mysqli_close($link);
?>