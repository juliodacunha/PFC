<?php
if(!isset($_SESSION)){
    session_start();
}

require('Conexao.php');
$id_usuario = $_SESSION['id'];

//Código abaixo para verificar se o usuário é um motorista
$query = "select imagem, senha, cnh from usuarios, motoristas where id_usuario = '$id_usuario'and id_usuario = user_iduser"; 
$result = mysqli_query($conexao, $query);
$linha = mysqli_num_rows($result);
$rows = [];
$linha = mysqli_fetch_assoc($result);
$rows[] = $linha;
$cnh = $rows[0]['cnh'];
$imagem = $rows[0]['imagem'];
//echo $cnh;

//linha abaixo para comparar senha antiga com a nova
$senha_antiga = $rows[0]['senha'];

if(isset($_POST['alterarfoto'])){
        // Get image name
        $image = $_FILES['novafoto']['name'];
        // image file directory
        $target = "../img/usuarios/";
        $temp = explode(".", $_FILES["novafoto"]["name"]);
        $novafoto = round(microtime(true)) . '.' . end($temp);
        $sql = "UPDATE usuarios SET imagem = '$novafoto' WHERE id_usuario = '$id_usuario'";
        if(mysqli_query($conexao, $sql)){ 
            move_uploaded_file($_FILES['novafoto']['tmp_name'], $target.$novafoto);
            echo "<div class='alert alert-success' role='alert'>
            Foto alterada.
          </div>";
            header('refresh: 1; url=../paginas/perfil.php');
        }
}

if(isset($_POST['editar'])){
    if(isset($cnh)){
        $nome = mysqli_real_escape_string($conexao, $_REQUEST['novonome']);
        $sobrenome = mysqli_real_escape_string($conexao, $_REQUEST['novosobrenome']);
        $senha = md5(mysqli_real_escape_string($conexao, $_REQUEST['novosenha'])); 
        $rg = mysqli_real_escape_string($conexao, $_REQUEST['novorg']);
        $cpf = mysqli_real_escape_string($conexao, $_REQUEST['novocpf']);
        //$email = mysqli_real_escape_string($conexao, $_REQUEST['novoemail']);
        $telefone = mysqli_real_escape_string($conexao, $_REQUEST['novotelefone']);
        //$sexo = mysqli_real_escape_string($conexao, $_REQUEST['sexo']);
        $cnh = mysqli_real_escape_string($conexao, $_REQUEST['novocnh']);
        //echo $nome;
        if($senha != $senha_antiga){
            $sql2 = "UPDATE usuarios SET senha='$senha' where id_usuario = '$id_usuario'";
        }
        $sql = "UPDATE usuarios, motoristas SET nome='$nome', sobrenome='$sobrenome', rg='$rg', cpf='$cpf', telefone='$telefone', cnh='$cnh' WHERE id_usuario='$id_usuario' and id_usuario = user_iduser";
    }else{
        $nome = mysqli_real_escape_string($conexao, $_REQUEST['novonome']);
        $sobrenome = mysqli_real_escape_string($conexao, $_REQUEST['novosobrenome']);
        $senha = md5(mysqli_real_escape_string($conexao, $_REQUEST['novosenha'])); 
        $rg = mysqli_real_escape_string($conexao, $_REQUEST['novorg']);
        $cpf = mysqli_real_escape_string($conexao, $_REQUEST['novocpf']);
        $telefone = mysqli_real_escape_string($conexao, $_REQUEST['novotelefone']);
        $curso = mysqli_real_escape_string($conexao, $_REQUEST['novocurso']);
        $turma = mysqli_real_escape_string($conexao, $_REQUEST['novoturma']);
        $matricula = mysqli_real_escape_string($conexao, $_REQUEST['novomatricula']);
        $cep = mysqli_real_escape_string($conexao, $_REQUEST['novocep']);
        $rua = mysqli_real_escape_string($conexao, $_REQUEST['novorua']);
        $numero = mysqli_real_escape_string($conexao, $_REQUEST['novonumero']);
        $bairro = mysqli_real_escape_string($conexao, $_REQUEST['novobairro']);
        $cidade = mysqli_real_escape_string($conexao, $_REQUEST['novocidade']);
        $estado = mysqli_real_escape_string($conexao, $_REQUEST['novoestado']);
        $complemento = mysqli_real_escape_string($conexao, $_REQUEST['novocomplemento']);
        if($senha != $senha_antiga){
            $sql2 = "UPDATE usuarios SET senha='$senha' where id_usuario = '$id_usuario'";
        }
        $sql = "UPDATE usuarios, passageiros, enderecos SET 
        nome='$nome', sobrenome='$sobrenome', rg='$rg', cpf='$cpf', telefone='$telefone', curso='$curso', turma = '$turma', matricula='$matricula', cep='$cep', rua='$rua', numero='$numero', bairro='$bairro', cidade='$cidade',estado='$estado', complemento='$complemento'   
        WHERE id_usuario='$id_usuario' and id_usuario_id = id_usuario and id_passageiro_id = id_passageiro";
    }
    if (mysqli_query($conexao, $sql)) {
        echo "Alterado com sucesso!";
        if(isset($sql2)){
            if(mysqli_query($conexao, $sql2)){
                echo "Senha alterada!";
            }
        }
        if(isset($sql3)){
            if(mysqli_query($conexao, $sql3)){
                echo "Foto alterada!";
            }
        }
        //echo $sql;
        header('refresh:1; url=../index.php');
    } else {
        echo "Erro ao editar o perfil: " . mysqli_error($conexao);
    }
}else{}

if(isset($_GET['excluir'])){
    if(isset($cnh)){
        //$sql = "DELETE FROM enderecos, passageiros, usuarios WHERE id_usuario = '$id_usuario'and id_usuario_id = id_usuario and id_passageiro_id = id_passageiro"
        $sql = "DELETE FROM motoristas WHERE user_iduser = '$id_usuario'";
        if (mysqli_query($conexao, $sql)) {
            $sql = "DELETE FROM usuarios WHERE id_usuario = '$id_usuario'";
            if (mysqli_query($conexao, $sql)) {
                echo "Usuário excluido com sucesso";
                session_destroy();
                header('refresh:2; url=../index.php');
            }
        } else {
            echo "Erro ao excluir: " . mysqli_error($conexao);
        }
    }else{
        //codio abaixo descobre o ID do passageiro
        $query = "select id_passageiro from usuarios, passageiros where id_usuario = '$id_usuario' and id_usuario = id_usuario_id"; 
        $result = mysqli_query($conexao, $query);
        $linha = mysqli_num_rows($result);
        $rows = [];
        $linha = mysqli_fetch_assoc($result);
        $rows[] = $linha;
        $id_passageiro = $rows[0]['id_passageiro'];
        //codigo abaixo realiza a exclusão 
        $sql = "DELETE FROM enderecos WHERE id_passageiro_id = '$id_passageiro'";
        if (mysqli_query($conexao, $sql)) {
            $sql = "DELETE FROM passageiros WHERE id_usuario_id = '$id_usuario'";
            if (mysqli_query($conexao, $sql)) {
                $sql = "DELETE FROM usuarios WHERE id_usuario = '$id_usuario'";
                if (mysqli_query($conexao, $sql)) {
                    echo "Usuário excluido com sucesso";
                    session_destroy();
                    header('refresh:2; url=../index.php');
                }    
            }
        }
    }
}

?>