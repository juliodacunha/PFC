<?php

include('../funcoes/Verifica_login.php');
require("head.php");
require("cabecalho.php");

//Abaixo o código de busca no banco de dados sobre o formulário de perfil do passageiro
$email = $_SESSION['email'];
$result = $conexao->query("SELECT nome, sobrenome, cpf, rg, telefone, email, senha, curso, turma, matricula, cep, rua, numero, bairro, cidade, estado, complemento
from usuarios, passageiros, enderecos 
where email = '$email' and id_usuario_id = id_usuario and id_passageiro = id_passageiro_id") or die($conexao->error);
$arrayPassageiro = $result->fetch_assoc();

//Abaixo perfil motorista
$resultMotorista = $conexao->query("SELECT nome, sobrenome, cpf, rg, telefone, email, senha, cnh
from usuarios, motoristas
where email = '$email' and user_iduser = id_usuario") or die($conexao->error);
$arrayMotorista = $resultMotorista->fetch_assoc();

//IF para nao dar erro no HTML caso o usuário seja um passageiro e nao um motorista.
if($arrayMotorista == null){
  $arrayMotorista = array();
}

//Verificar se o perfil é de motorista ou passageiro e exibir os dados
if (array_key_exists("cnh", $arrayMotorista)) {
  //echo "O elemento 'cnh' está no array!";
  $row = $arrayMotorista;
  $validar = 0;
}elseif(array_key_exists("matricula", $arrayPassageiro)){
  //echo "O usuário é um passageiro";
  $row = $arrayPassageiro;
  $validar = 1;
}

?>

<html lang="en">
<head>
    <title>Meu perfil</title>
</head>
<!-- PARTE DA PÁGINA -->
<div class="container">
      <div class="row">
       <br>
      </div>
        <div class="toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title my-3 mb-5"><?php echo $row['nome']?> <?php echo $row['sobrenome']; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="#" class="img-circle img-responsive"> </div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nome:</td>
                        <td><?php echo $row['nome']; ?></td>
                      </tr>
                      <tr>
                        <td>Sobrenome:</td>
                        <td><?php echo $row['sobrenome']; ?></td>
                      </tr>
                      <tr>
                        <td>CPF</td>
                        <td><?php echo $row['cpf']; ?></td>
                      </tr>
                         <tr>
                             <tr>
                        <td>RG</td>
                        <td><?php echo $row['rg']; ?></td>
                      </tr>
                        <tr>
                        <td>Telefone</td>
                        <td><?php echo $row['telefone']; ?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><?php echo $row['email']; ?></a></td>
                      </tr>
                      <tr>
                        <td>Senha</td>
                        <td><?php echo $row['senha']; ?></td>                           
                      </tr>

                      <?php if(isset ($row['curso'])): ?>

                      <tr>
                        <td>Curso</td>
                        <td><?php echo $row['curso']; ?></a></td>
                      </tr>
                      <tr>
                        <td>Turma</td>
                        <td><?php echo $row['turma']; ?></td>                           
                      </tr>
                      </tr>
                        <td>Matrícula</td>
                        <td><?php echo $row['matricula']; ?></td>                           
                      </tr>
                      <tr>
                        <td>CEP</td>
                        <td><?php echo $row['cep']; ?></td>                           
                      </tr>
                      <tr>
                        <td>Rua</td>
                        <td><?php echo $row['rua']; ?></td>                           
                      </tr>
                      <tr>
                        <td>Número</td>
                        <td><?php echo $row['numero']; ?></td>                           
                      </tr>
                      <tr>
                        <td>Bairro</td>
                        <td><?php echo $row['bairro']; ?></td>                           
                      </tr>
                      <tr>
                        <td>Cidade</td>
                        <td><?php echo $row['cidade']; ?></td>                           
                      </tr>
                      <tr>
                        <td>Estado</td>
                        <td><?php echo $row['estado']; ?></td>                           
                      </tr>
                      <tr>
                        <td>Complemento</td>
                        <td><?php echo $row['complemento']; ?></td>        
                      </tr>

                      <?php endif; ?>
                      <?php if(isset ($row['cnh'])): ?>

                      <tr>
                        <td>CNH</td>
                        <td><?php echo $row['cnh']; ?></td>        
                      </tr>

                      <?php endif; ?>
                      
                    </tbody>
                  </table>
                  <a href="#" class="btn btn-primary">Guardar alterações</a>
                </div>
              </div>
            </div>  
          </div>
        </div>
      </div>
    </div>