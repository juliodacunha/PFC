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
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <form action="cadastro_usuario.php" method="post" name="registroPassageiro" enctype="multipart/form-data" autocomplete="off">
                <div class="alert alert-error"></div>
                <h3 class="register-heading my-5 mx-auto" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 30PX; text-align: center;">Cadastre-se como um aluno</h3>
                <div class="row register-form">
                    <input type="hidden" id="tipuser_tip_user" name="tipuser_tip_user" value="1">
                    <input type="hidden" id="emp_cod_empresa" name="emp_cod_empresa" value="1">
                    <div class="col-md-3">
                        <div class=>
                            <input type="text" class="form-control mb-4" placeholder="Primeiro nome *" id="nome" name="nome" value="<?php if(isset ($nome)){ echo $nome;} ?>" required minlength="1" maxlength="15">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ultimo nome *" id="sobrenome" name="sobrenome" value="<?php if(isset ($sobrenome)){ echo $sobrenome;} ?>" required minlength="1" maxlength="15">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Senha *" id="senha" name="senha" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="RG *" id="rg" name="rg" value="<?php if(isset ($rg)){ echo $rg;} ?>" required minlength="7" maxlength="7"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="CPF *" id="cpf" name="cpf" value="<?php if(isset ($cpf)){ echo $cpf;} ?>" minlength="10"  maxlength="11" required />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email *" id="email" name="email" value="<?php if(isset ($email)){ echo $email;} ?>" minlength="5" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="CEP *" id="cep" name="cep" value="<?php if(isset ($cep)){ echo $cep;} ?>" required minlength="7"  maxlength="8" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Rua *" id="rua" name="rua" value="<?php if(isset ($rua)){ echo $rua;} ?>" required minlength="1" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Número da residência *" id="numero" name="numero" value="<?php if(isset ($numero)){ echo $numero;} ?>" required minlength="1" maxlength="5"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Complemento *" id="complemento" name="complemento" value="<?php if(isset ($complemento)){ echo $complemento;} ?>" required minlength="2" maxlength="15" />
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Bairro *" id="bairro" name="bairro" value="<?php if(isset ($bairro)){ echo $bairro;} ?>" required minlength="2" maxlength="15"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Cidade *" id="cidade" name="cidade" value="<?php if(isset ($cidade)){ echo $cidade;} ?>" required minlength="2" maxlength="15"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Estado *" id="estado" name="estado" value="<?php if(isset ($estado)){ echo $estado;} ?>" required minlength="1" maxlength="2"/>
                        </div>
                        <div class="form-group">
                            <input type="text" minlength="10" maxlength="11" name="telefone" class="form-control" placeholder="Telefone *" value="<?php if(isset ($telefone)){ echo $telefone;} ?>" name="telefone" required />
                        </div>
                        <div class="form-group">
                            <input type="text" minlength="3" maxlength="10" name="turma" class="form-control" placeholder="Turma *" id="turma" name="turma" value="<?php if(isset ($turma)){ echo $turma;} ?>" required />
                        </div>
                        
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" minlength="4" maxlength="15" name="curso" class="form-control" placeholder="Curso *" id="curso" name="curso" value="<?php if(isset ($curso)){ echo $curso;} ?>" required />
                        </div>
                        <div class="form-group">
                            <input type="text" minlength="10" maxlength="10" name="matricula" class="form-control" placeholder="Matricula *" id="matricula" value="<?php if(isset ($matricula)){ echo $matricula;} ?>" name="matricula" required />
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto"
                                accept="image/*" required>
                                <label class="custom-file-label" for="inputGroupFile01">Sua foto</label>
                            </div>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input"  name="sexo" id="masculino" value="Masculino" checked>
                            <label class="custom-control-label" for="masculino">Masculino</label>
                        </div>
                        
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="sexo" id="feminino" value="Feminino">
                            <label class="custom-control-label" for="feminino">Feminino</label>
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
                            <div class="form-group">
    
                                <input type="text" class="form-control" placeholder="Primeiro nome *" value="<?php if(isset ($nome)){ echo $nome;} ?>" name="nome" id="nome"/>
                            </div>
                            <div class="form-group">
                            
                                <input type="text" class="form-control" placeholder="Ultimo nome *" value="<?php if(isset ($sobrenome)){ echo $sobrenome;} ?>" name="sobrenome" id="sobrenome"/>
                            </div>
                            <div class="form-group">
                            
                                <input type="password" class="form-control" placeholder="Senha *" value="" name="senha" id="senha"/>
                            </div>
                            <div class="form-group">
                            
                                <input type="text" class="form-control"  placeholder="RG *" value="<?php if(isset ($rg)){ echo $rg;} ?>" name="rg" id="rg" minlength="7" maxlength="7"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            
                                <input type="text" class="form-control"  placeholder="CPF *" value="<?php if(isset ($cpf)){ echo $cpf;} ?>" name="cpf" id="cpf" maxlength="11"/>
                            </div>
                            <div class="form-group">
                            
                                <input type="email" class="form-control" placeholder="Email *" value="<?php if(isset ($email)){ echo $email;} ?>" name="email" id="email"/>
                            </div>
                            <div class="form-group">
                            
                                <input type="text" minlength="10" maxlength="10" class="form-control" placeholder="Telefone *" value="<?php if(isset ($telefone)){ echo $telefone;} ?>" name="telefone" id="telefone" />
                            </div>
                            <div class="form-group">
                            
                                <input type="text" minlength="10" maxlength="10" name="cnh" id="cnh" class="form-control" placeholder="CNH *" value="<?php if(isset ($cnh)){ echo $cnh;} ?>" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="custom-file mb-3 mt-1">
                                    <input type="file" class="custom-file-input" name="foto"
                                    accept="image/*" required>
                                    <label class="custom-file-label" for="foto">Sua foto</label>
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input"  name="sexo" id="masc" value="Masculino" checked>
                                <label class="custom-control-label" for="masc">Masculino</label>
                            </div>
                            
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sexo" id="fem" value="Feminino">
                                <label class="custom-control-label" for="fem">Feminino</label>
                            </div>
                        </div>
                    </div>
                
                    <input type="submit" class="btnRegister" style="float: right" name="submit" value="Registrar"/>
                </div>
            </form>
        </div>
    </div>
</div>
