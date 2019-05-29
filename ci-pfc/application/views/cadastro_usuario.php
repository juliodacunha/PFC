
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Gerenciamento de vans</title>
</head>

<!-- PARTE DO CADASTRO -->
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

