<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Perfil</title>
</head>

<div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <form action="<?= base_url() ?>Cadastro_usuario/cadastrarUsuario" method="post">
            <h3 class="register-heading">Alterar dados</h3>
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
            <input type="submit" class="btnRegister" style="float: right"  value="Alterar"/>

        </form>