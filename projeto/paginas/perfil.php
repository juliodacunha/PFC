<?php
if(!isset($_SESSION)){
  session_start();
}
require("cabecalho.php");
if(!$_SESSION['id']){
  header('Location: ../index.php');
  exit;
}
$id_usuario = $_SESSION['id'];

//Abaixo o código de busca no banco de dados sobre o formulário de perfil do passageiro
$email = $_SESSION['email'];
$result = $conexao->query("SELECT imagem, nome, sobrenome, cpf, rg, telefone, email, senha, curso, turma, matricula, cep, rua, numero, bairro, cidade, estado, complemento
from usuarios, passageiros, enderecos 
where email = '$email' and id_usuario_id = id_usuario and id_passageiro = id_passageiro_id") or die($conexao->error);
$arrayPassageiro = $result->fetch_assoc();

//Abaixo perfil motorista
$resultMotorista = $conexao->query("SELECT imagem, nome, sobrenome, cpf, rg, telefone, email, senha, cnh
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
  $row = $arrayPassageiro;
  $validar = 1;
}
$id_usuario = $_SESSION['id'];
$query = "SELECT id_motorista_id FROM usuarios, passageiros WHERE id_usuario = $id_usuario AND id_usuario = id_usuario_id"; 
$result = mysqli_query($conexao, $query);
$linha = mysqli_num_rows($result);
$rows = [];
$linha = mysqli_fetch_assoc($result);
$rows[] = $linha;
$id_motorista = $rows[0]['id_motorista_id'];

$descobrir_nome = $conexao->query("SELECT nome, sobrenome FROM usuarios, motoristas WHERE id_usuario = user_iduser and id_motorista = '$id_motorista'");
while($info = $descobrir_nome->fetch_array()){
  $nomemotorista = $info['nome']." ".$info['sobrenome'];
}

?>

<html lang="en">
<head>
    <title>Meu perfil</title>
    <script>
    function editarperfil() {
      var x = document.getElementById("editarperfil");
      var y = document.getElementById("perfil");
      if (x.style.display === "none") {
        x.style.display = "block";
        //y.style.display = "none";
      } else {
        x.style.display = "none";
        //y.style.display = "block";
      }
    }
    </script>
</head>
<!-- PARTE DA PÁGINA -->
<div class="container">
      <div class="row">
       <br>
      </div>
        <div class="toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title mt-3 mb-0"><?php echo $row['nome']?> <?php echo $row['sobrenome']; ?></h3>
              <p class="panel-title mb-3 mt-1"><?php if(isset($nomemotorista)){ ?>passageiro de <?php echo $nomemotorista; }else{ if(isset ($row['curso'])){ echo "Você não tem um motorista"; }} ?></p>
            </div>
            <div id="perfil" style="none"> 
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " text-align="center">
                 
                  <img alt="User Pic" src="../img/usuarios/<?php if(isset($row['imagem'])){ echo $row['imagem']; }else{ echo "semfoto.png"; } ?>" class="img-thumbnail img-responsive"> 
                  <form action="../backend/Perfil.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="novafoto" name="novafoto" required accept="image/*">
                        <label class="custom-file-label" for="novafoto"></label>
                      </div>
                      <div class="input-group-append">
                        <button type="submit" name="alterarfoto" class="btn btn-dark btn-sm">Alterar</button>
                      </div>
                    </div>
                  </form>
                </div> 
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nome:</td>
                        <td><?php echo $row['nome']." ".$row['sobrenome']; ?></td>                      
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
                                 
                </div>
              </div>  
              </div>
              <button onclick="editarperfil()" type="button" class="btn btn-dark" id="bbbb">Mostrar/esconder opções do perfil</button>
              <div id="editarperfil" style="display:none">
              <div class="row">
              <?php
              if(isset($_SESSION['message'])):?>
              <div class="alert alert-<?=$_SESSION['msg_type']?>">

              <?php
              echo $_SESSION['message'];
              unset($_SESSION['message']);
              ?>
              </div>
              <?php endif  ?>
                <form action="../backend/Perfil.php" method="POST" enctype="multipart/form-data">
                  <div class="crud">
                  <table class="crud">
                  <tr>
                    <td>Nome</td>
                    <td><input type="text" class="form-control" value="<?php echo $row['nome']; ?>" placeholder="Nome" name="novonome" required maxlength="15"></td>
                  </tr>
                  <tr>
                    <td>Sobrenome</td>
                    <td><input type="text" class="form-control" value="<?php echo $row['sobrenome']; ?>" placeholder="Sobrenome" name="novosobrenome" required maxlength="15"></td>
                  </tr>
                  <tr>
                    <td>CPF</td>
                    <td><input type="text" class="form-control" value="<?php echo $row['cpf']; ?>" placeholder="CPF" name="novocpf" required maxlength="11"></td>
                  </tr>
                  <tr>
                    <td>RG</td>
                    <td><input type="text" class="form-control" value="<?php echo $row['rg']; ?>" placeholder="RG" name="novorg" required maxlength="7"></td>
                  </tr>
                  <tr>
                    <td>Telefone</td>
                    <td><input type="text" class="form-control" value="<?php echo $row['telefone']; ?>" placeholder="Telefone" name="novotelefone" required minlength="10" maxlength="11"></td>
                  </tr>
                  <tr>
                    <td>Senha</td>
                    <td><input type="password" class="form-control" value="<?php echo $row['senha']; ?>" placeholder="Senha" name="novosenha" required></td>
                  </tr>
                  <?php if(isset ($row['cnh'])): ?>
                  <tr>
                    <td>CNH</td>
                    <td><input type="text" class="form-control" value="<?php echo $row['cnh']; ?>" placeholder="CNH" name="novocnh" minlength="10" maxlength="10"></td>
                  </tr>
                  <?php endif ?>
                  <?php if(isset($row['curso'])): ?>
                  <tr>
                    <td>Curso</td>
                    <td><input type="text" class="form-control" value="<?php echo $row['curso']; ?>" placeholder="Curso" name="novocurso" minlength="3" maxlength="15" required></tr>
                  </tr>
          
                  <tr>
                    <td>Turma</td>
                    <td><input type="text" class="form-control" value="<?php echo $row['turma']; ?>" placeholder="Turma" name="novoturma" minlength="3" maxlength="10" required></tr>
                  </tr>
                  <tr>
                    <td>Matricula</td>
                    <td><input type="text" class="form-control" value="<?php echo $row['matricula']; ?>" placeholder="Matricula" name="novomatricula" minlength="10" maxlength="10" required></td>
                  </tr>
                  <tr>
                    <td>CEP</td>
                    <td><input type="text" class="form-control" value="<?php echo $row['cep']; ?>" placeholder="CEP" name="novocep" minlength="8" maxlength="8" required></td>
                  </tr>
                  <tr>
                    <td>Rua</td>
                    <td><input type="text" class="form-control" value="<?php echo $row['rua']; ?>" placeholder="Rua" name="novorua" minlength="5" maxlength="35" required></td>
                  </tr>
                  <tr>
                     <td>Numero</td>
                     <td><input type="text" class="form-control" value="<?php echo $row['numero']; ?>" placeholder="Numero" name="novonumero" minlength="1" maxlength="5" required></td>
                  </tr>
                  <tr>
                    <td>Bairro</td>
                    <td><input type="text" class="form-control" value="<?php echo $row['bairro']; ?>" placeholder="Bairro" name="novobairro" minlength="2" maxlength="20" required></td>
                  </tr>
                  <tr>
                    <td>Cidade</td>
                    <td><input type="text" class="form-control" value="<?php echo $row['cidade']; ?>" placeholder="Cidade" name="novocidade" minlength="2" maxlength="30"></td>
                  </tr>
                  <tr>
                    <td>Estado</td>
                    <td><input type="text" class="form-control" value="<?php echo $row['estado']; ?>" placeholder="Estado" name="novoestado" minlength="2" maxlength="2"></td>
                  </tr>
                  <tr>
                    <td>Complemento</td>
                    <td><input type="text" class="form-control" value="<?php echo $row['complemento']; ?>" placeholder="Complemento" name="novocomplemento" minlength="2" maxlength="15"></td>
                  </tr>
                  <?php endif ?>
               
                  </table>
                  <button type="submit" class="btn btn-dark" name="editar">Alterar dados</button>
                  <a href="confirmar_exclusao.php">
                    <button type="button" class="btn btn-danger" name="excluir">Excluir conta</button>
                  </a>
                  </form>
                  </div>
              </div>
              </div>
              <div> 
                
              </div>

            </div>  
          </div>
        </div>
      </div>
    </div>