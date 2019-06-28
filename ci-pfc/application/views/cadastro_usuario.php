<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Cadastro</title>
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
        <form action="<?= base_url() ?>Cadastro_usuario/cadastrarUsuario" method="post">
            <h3 class="register-heading">Cadastre-se como um aluno</h3>
                        <div class="row register-form">
                        <input type="hidden" id="tipuser_tip_user" name="tipuser_tip_user" value="1">
                        <input type="hidden" id="emp_cod_empresa" name="emp_cod_empresa" value="1">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Primeiro nome *" id="nome" name="nome" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ultimo nome *" id="sobrenome" name="sobrenome" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Senha *" id="senha" name="senha"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="RG *" id="rg" name="rg" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="CPF *" id="cpf" name="cpf" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email *" id="email" name="email"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="CEP *" id="cep" name="cep"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Rua *" id="rua" name="rua" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Número da residência *" id="numero" name="numero" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Complemento *" id="complemento" name="complemento" />
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Bairro *" id="bairro" name="bairro" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Cidade *" id="cidade" name="cidade" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Estado *" id="estado" name="estado" />
                    </div>
                    <div class="form-group">
                        <input type="text" minlength="10" maxlength="11" name="telefone" class="form-control" placeholder="Telefone *" id="telefone" name="telefone" />
                    </div>
                    <div class="form-group">
                        <input type="text" minlength="3" maxlength="10" name="turma" class="form-control" placeholder="Turma *" id="turma" name="turma" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" minlength="4" maxlength="15" name="curso" class="form-control" placeholder="Curso *" id="curso" name="curso" />
                    </div>
                    <div class="form-group">
                        <input type="text" minlength="10" maxlength="10" name="matricula" class="form-control" placeholder="Matricula *" id="matricula" name="matricula" />
                    </div>
                    <div class="form-group">
                        <div class="maxl">
                            <label class="radio inline">
                                <input type="radio" name="sexo" id="sexo" value="Masculino" checked>
                                <span> Masculino </span>
                            </label>
                            <label class="radio inline">
                                <input type="radio" name="sexo" id="sexo" value="Feminino">
                                <span>Feminino </span>
                            </label>
                        </div>
                    </div>
                </div>

            </div>
            <input type="submit" class="btnRegister" style="float: right"  value="Registrar"/>

        </form>
            <!-- FIM DO REGISTRO DE USUÁRIO -->
            <!-- REGISTRO DE MOTORISTA -->
        </div>
        <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h3 class="register-heading">Cadastre-se como um motorista</h3>
            <div class="row register-form">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Primeiro nome *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ultimo nome *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Senha *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="RG *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="CPF *" value="" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Rua *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Número da residência *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Complemento *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Bairro *" value="" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Cidade *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Estado *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Telefone *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" minlength="10" maxlength="10" name="cnh" class="form-control" placeholder="CNH *" value="" />
                    </div>

                    <div class="form-group">
                        <div class="maxl">
                            <label class="radio inline">
                                <input type="radio" name="gender" value="Masculino" checked>
                                <span> Masculino </span>
                            </label>
                            <label class="radio inline">
                                <input type="radio" name="gender" value="Feminino">
                                <span>Feminino </span>
                            </label>
                        </div>
                    </div>
                </div>

            </div>
            <input type="submit" class="btnRegister" style="float: right"  value="Registrar"/>
        </div>
    </div>
</div>







    <!--
<div class="container">
    <div class="card w-50 mx-auto my-5">
        <article class="card-body mx-auto" style="">
            <h4 class="card-title mt-3 text-center">Criar conta</h4>
            <form action="<?= base_url() ?>Cadastro_usuario/cadastrar" method="post">
                <div class="form-group">
                    <label for="tipuser_tip_user">Você é: </label>
                    <select id="tipuser_tip_user" name="tipuser_tip_user">
                        <option value="1">Aluno</option>
                        <option value="2">Motorista</option>
                        <option value="3">Dono de empresa</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" placeholder="Apenas números" name="cpf" required>
                </div>
                <div class="form-group">
                    <label for="rg">RG</label>
                    <input type="text" class="form-control" id="rg" placeholder="Apenas números" name="rg" required>
                </div>
                <div class="form-group">
                    <label for="email">Endereço de email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="email@email.com" name="email">
                </div>
                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select id="sexo" name="sexo">
                        <option value="1">Masculino</option>
                        <option value="2">Feminino</option>
                        <option value="3">Outros</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" placeholder="Primeiro nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="nome">Sobrenome</label>
                    <input type="text" class="form-control" id="nome" placeholder="Sobrenome" name="sobrenome" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha" required>
                </div>
                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
        </article>
    </div> <!-- card.// -->
</div>

