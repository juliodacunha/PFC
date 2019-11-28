<?php
require("cabecalho.php");
require("../backend/cadastro_usuario.php");
?>

<html lang="en">
<head>
    <title>Cadastro de usuário</title>
</head>
<!-- PARTE DO CADASTRO -->
<div class="col-md-12 register-right">
    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Aluno</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Motorista</a>
        </li>
    </ul>
    <!-- REGISTRO DE ALUNO -->
    <div class="container-fluid">
        <div class="tab-content " id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form action="cadastro_usuario.php" method="post" name="registroPassageiro" enctype="multipart/form-data" autocomplete="off">
                    <div class="alert alert-error"></div>
                    <h3 class="register-heading my-5 mx-auto" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 30PX; text-align: center;">Cadastre-se como um aluno</h3>
                    <div class="row register-form">
                        <input type="hidden" id="tipuser_tip_user" name="tipuser_tip_user" value="1">
                        <input type="hidden" id="emp_cod_empresa" name="emp_cod_empresa" value="1">
                        <div class="row">
                            <div class="col">
                                <label class="col-sm control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal;">Nome</label>
                                <input type="text" class="form-control mt-0 mb-4 mt-0" placeholder="" id="nome" name="nome" value="<?php if(isset ($nome)){ echo $nome;} ?>" required minlength="1" maxlength="15">
                            </div>
                            <div class="col">
                                <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal">Sobrenome</label>
                                <input type="text" class="form-control mt-0" placeholder="" id="sobrenome" name="sobrenome" value="<?php if(isset ($sobrenome)){ echo $sobrenome;} ?>" required minlength="1" maxlength="15">
                            </div>
                            <div class="col">
                                <label class="col-md-5 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal">E-mail</label>
                                <input type="email" class="form-control mt-0" placeholder="" id="email" name="email" value="<?php if(isset ($email)){ echo $email;} ?>" minlength="5" required/>
                            </div>
                            <div class="col">
                                <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal">CPF      </label>
                                <input type="text" class="form-control mt-0"  placeholder="apenas números" id="cpf" name="cpf" value="<?php if(isset ($cpf)){ echo $cpf;} ?>" minlength="10"  maxlength="11" required />
                            </div>
                            <div class="col">
                                <label class="col-sm control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal">RG</label>
                                <input type="text" class="form-control mt-0"  placeholder="apenas números" id="rg" name="rg" value="<?php if(isset ($rg)){ echo $rg;} ?>" required minlength="7" maxlength="7"/>
                            </div>
                            <div class="col">
                                <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal">Telefone</label>
                                <input type="text" minlength="10" maxlength="11" name="telefone" class="form-control mt-0" placeholder="" value="<?php if(isset ($telefone)){ echo $telefone;} ?>" name="telefone" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal">Rua</label>
                                <input type="text" class="form-control mt-0" placeholder="" id="rua" name="rua" value="<?php if(isset ($rua)){ echo $rua;} ?>" required minlength="1" />
                            </div>
                            <div class="col">
                                <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal">Número</label>
                                <input type="text" class="form-control mt-0" placeholder="" id="numero" name="numero" value="<?php if(isset ($numero)){ echo $numero;} ?>" required minlength="1" maxlength="5"/>
                            </div>
                            <div class="col">
                                <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal">Bairro</label>
                                <input type="text" class="form-control mt-0"  placeholder="" id="bairro" name="bairro" value="<?php if(isset ($bairro)){ echo $bairro;} ?>" required minlength="2" maxlength="15"/>
                            </div>
                            <div class="col">
                                <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal">Cidade</label>
                                <input type="text" class="form-control mt-0" placeholder="" id="cidade" name="cidade" value="<?php if(isset ($cidade)){ echo $cidade;} ?>" required minlength="2" maxlength="15"/>
                            </div>
                            <div class="col">
                                <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal">Complemento</label>
                                <input type="text" class="form-control mt-0"  placeholder="" id="complemento" name="complemento" value="<?php if(isset ($complemento)){ echo $complemento;} ?>" required minlength="2" maxlength="15" />
                            </div>
                            <div class="col">
                                <label class="col-md-2 control-label"for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal">Estado</label>
                                <input type="text" class="form-control mt-0" placeholder="" id="estado" name="estado" value="<?php if(isset ($estado)){ echo $estado;} ?>" required minlength="1" maxlength="2"/>
                            </div>
                            

                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal">CEP</label>
                                <input type="text" class="form-control mt-0" placeholder="" id="cep" name="cep" value="<?php if(isset ($cep)){ echo $cep;} ?>" required minlength="7"  maxlength="8" />
                            </div>
                            
                            <div class="col-md-2 ">
                                <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal">Turma</label>
                                <input type="text" minlength="3" maxlength="10" name="turma" class="form-control mt-0" placeholder="" id="turma" name="turma" value="<?php if(isset ($turma)){ echo $turma;} ?>" required />
                            </div>
                            <div class="col-md-2 ">
                                <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal">Matrícula</label>
                                <input type="text" minlength="10" maxlength="10" name="matricula" class="form-control mt-0" placeholder="" id="matricula" value="<?php if(isset ($matricula)){ echo $matricula;} ?>" name="matricula" required />
                            </div>
                            <div class="col-md-2 ">
                                <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal">Curso</label>
                                <input type="text" minlength="4" maxlength="15" name="curso" class="form-control mt-0" placeholder="" id="curso" name="curso" value="<?php if(isset ($curso)){ echo $curso;} ?>" required />
                            </div>
                            <div class="col-md-2 ">
                                <label class="col-md-2 control-label"for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal">Senha </label>
                                <input type="password" class="form-control mt-0" placeholder="" id="senha" name="senha" required />
                            </div>
                            <div class="col-md-2 mt-3 ">
                                <input type="radio" class="custom-control-input" name="sexo" id="masculino" value="Masculino" checked>
                                <label class="custom-control-label" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal;" for="masculino">Masculino</label>
                                <div>
                                <input type="radio" class="custom-control-input" name="sexo" id="feminino" value="Feminino">
                                <label class="custom-control-label" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal;" for="feminino">Feminino</label>
                                </div>
                            </div>
                            
                            <div class="col">
                                
                            </div>   
                            
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="custom-file mt-4">
                                    <input type="file" class="custom-file-input" id="imgInp" name="foto"
                                    accept="image/*" required>
                                    <label class="custom-file-label" for="inputGroupFile01">Sua foto</label>
                                </div>
                            </div>
                            <div class="ml-2">
                                <img id="blah" src="#" alt="" class="ml-2" style="max-width: 10%" />
                            </div>
                                 
                        </div>
                    </div>
                    <input type="submit" class="btnRegister" style="float: right" name="registrar" value="Registrar-se"/>
                </form>
                <!-- FIM DO REGISTRO DE USUÁRIO -->
                <!-- REGISTRO DE MOTORISTA -->
            </div>
            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <form action="cadastro_usuario.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading my-5" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 30PX; text-align: center;">Cadastre-se como um motorista</h3>
                        <div class="row register-form">
                            <input type="hidden" id="tipuser_tip_user" name="tipuser_tip_user" value="2">
                            <input type="hidden" id="emp_cod_empresa" name="emp_cod_empresa" value="1">
                            <input type="hidden" id="ativo" name="ativo" value="1">
                            <input type="hidden" id="emp_idempresa" name="emp_idempresa" value="1">
                            <div class="col-md-4">
                                <div class="col">
                                    <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal;">Nome</label>
                                    <input type="text" class="form-control mt-0" placeholder="" value="<?php if(isset ($nome)){ echo $nome;} ?>" name="nome" id="nome"/>
                                </div>
                                <div class="col">
                                    <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal;">Sobrenome</label>
                                    <input type="text" class="form-control mt-0" placeholder="" value="<?php if(isset ($sobrenome)){ echo $sobrenome;} ?>" name="sobrenome" id="sobrenome"/>
                                </div>
                                <div class="col">
                                    <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal;">Senha</label>                        
                                    <input type="password" class="form-control mt-0" placeholder="" value="" name="senha" id="senha"/>
                                </div>
                                <div class="col">
                                    <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal;">RG</label>
                                    <input type="text" class="form-control"  placeholder="apenas números" value="<?php if(isset ($rg)){ echo $rg;} ?>" name="rg" id="rg" minlength="7" maxlength="7"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col">
                                <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal;">CPF</label>
                                    <input type="text" class="form-control"  placeholder="apenas números" value="<?php if(isset ($cpf)){ echo $cpf;} ?>" name="cpf" id="cpf" maxlength="11"/>
                                </div>
                                <div class="col">
                                    <label class="col-md-4 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal;">E-mail</label>
                                    <input type="email" class="form-control" placeholder="" value="<?php if(isset ($email)){ echo $email;} ?>" name="email" id="email"/>
                                </div>
                                <div class="col">
                                    <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal;">Telefone</label>
                                    <input type="text" minlength="10" maxlength="10" class="form-control" placeholder="" value="<?php if(isset ($telefone)){ echo $telefone;} ?>" name="telefone" id="telefone" />
                                </div>
                                <div class="col">
                                    <label class="col-md-2 control-label" for="exampleInputEmail1" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal;">CNH</label>
                                    <input type="text" minlength="10" maxlength="10" name="cnh" id="cnh" class="form-control" placeholder="" value="<?php if(isset ($cnh)){ echo $cnh;} ?>" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="custom-file mt-4">
                                        <input type="file" class="custom-file-input" id="imgInp2" name="foto"
                                        accept="image/*" required>
                                        <label class="custom-file-label" for="inputGroupFile01">Sua foto</label>
                                    </div>
                                </div>
                                <div>
                                    <img id="blah2" src="#" alt="" style="max-width: 50%" />
                                </div>
                                <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input"  name="sexo" id="masc" value="Masculino" checked>
                                    <label class="custom-control-label" for="masc" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal;">Masculino</label>
                                </div>
                                
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="sexo" id="fem" value="Feminino">
                                    <label class="custom-control-label" for="fem" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal;">Feminino</label>
                                </div>
                                <input type="submit" class="btnRegister mt-5" style="float: right" name="submit" value="Registrar"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
function readURL(input) {

if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
}
}

$("#imgInp").change(function(){
readURL(this);
});

function readURL2(input) {
if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#blah2').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
}
}

$("#imgInp2").change(function(){
readURL2(this);
});
</script>