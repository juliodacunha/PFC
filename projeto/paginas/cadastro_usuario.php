<?php

require("head.php");
require("cabecalho.php");
require("../funcoes/cadastro_usuario.php");

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
            <form action="cadastro_usuario.php" method="post" name="registroPassageiro">
                <div class="alert alert-error"><?= $_SESSION['message']; ?></div>
                <h3 class="register-heading my-5 mx-auto" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 30PX; text-align: center;">Cadastre-se como um aluno</h3>
                <div class="row register-form">
                    <input type="hidden" id="tipuser_tip_user" name="tipuser_tip_user" value="1">
                    <input type="hidden" id="emp_cod_empresa" name="emp_cod_empresa" value="1">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Primeiro nome *" id="nome" name="nome" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ultimo nome *" id="sobrenome" name="sobrenome" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Senha *" id="senha" name="senha" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="RG *" id="rg" name="rg" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="CPF *" id="cpf" name="cpf" required/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email *" id="email" name="email" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="CEP *" id="cep" name="cep" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Rua *" id="rua" name="rua" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Número da residência *" id="numero" name="numero" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Complemento *" id="complemento" name="complemento" required />
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Bairro *" id="bairro" name="bairro" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Cidade *" id="cidade" name="cidade" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Estado *" id="estado" name="estado" required />
                        </div>
                        <div class="form-group">
                            <input type="text" minlength="10" maxlength="11" name="telefone" class="form-control" placeholder="Telefone *" id="telefone" name="telefone" required />
                        </div>
                        <div class="form-group">
                            <input type="text" minlength="3" maxlength="10" name="turma" class="form-control" placeholder="Turma *" id="turma" name="turma" required />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" minlength="4" maxlength="15" name="curso" class="form-control" placeholder="Curso *" id="curso" name="curso" required />
                        </div>
                        <div class="form-group">
                            <input type="text" minlength="10" maxlength="10" name="matricula" class="form-control" placeholder="Matricula *" id="matricula" name="matricula" required />
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
            <form action="cadastro_usuario.php" method="post">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading my-5" style="font-family: 'CustomFont'; font-weight:normal; font-style:normal; font-size: 30PX; text-align: center;">Cadastre-se como um motorista</h3>
                    <div class="row register-form">
                        <input type="hidden" id="tipuser_tip_user" name="tipuser_tip_user" value="2">
                        <input type="hidden" id="emp_cod_empresa" name="emp_cod_empresa" value="1">
                        <input type="hidden" id="ativo" name="ativo" value="1">
                        <input type="hidden" id="emp_idempresa" name="emp_idempresa" value="1">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Primeiro nome *" value="" name="nome" id="nome"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Ultimo nome *" value="" name="sobrenome" id="sobrenome"/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Senha *" value="" name="senha" id="senha"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="RG *" value="" name="rg" id="rg"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="CPF *" value="" name="cpf" id="cpf"/>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email *" value="" name="email" id="email"/>
                            </div>
                            <div class="form-group">
                                <input type="text" minlength="10" maxlength="10" class="form-control" placeholder="Telefone *" value="" name="telefone" id="telefone" />
                            </div>
                            <div class="form-group">
                                <input type="text" minlength="10" maxlength="10" name="cnh" id="cnh" class="form-control" placeholder="CNH *" value="" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input"  name="sexo" id="masc" value="Masculino">
                                <label class="custom-control-label" for="masc">Masculino</label>
                            </div>
                            
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sexo" id="fem" value="Feminino">
                                <label class="custom-control-label" for="fem">Feminino</label>
                            </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btnRegister" style="float: right" name="registrar" value="Registrar"/>
                </div>
            </form>
        </div>
    </div>
</div>

