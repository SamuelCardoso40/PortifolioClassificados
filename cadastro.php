<?php
require 'processa.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cidade Conectada</title>    
    <style>
    #voltar{
        padding: 10px;    
	    color: red;
        background: linear-gradient(180deg, rgba(32, 65, 43, 0.533), rgba(106, 153, 168, 0.6));
        border: 1px solid white;
        text-transform: uppercase;
        }
    </style>
    
</head>
<body id="cad">
    <div id="voltar"> <a href="index.php">Voltar</a></div>
    <div id="corpo-formulario-cad">
        <h1>cadastro de usuário</h1>
        <form action="" method="POST">        
        <div class="inputBox">        
            <input type="text" name="nome" id="nome" class="inputUser" required>
            <label for="nome" class="labelInput">Nome Completo</label>
        </div>
        <div class="inputBox">
            <input type="number" name="cpf" id="cpf" class="inputUser" required>
            <label for="cpf" class="labelInput">CPF</label>
        </div>
        <div class="inputBox">
            <input type="email" name="email" id="email" class="inputUser" required>
            <label for="email" class="labelInput">E-Mail</label>
        </div>
        <div class="inputBox">
            <input type="tel" name="telefone" id="telefone" class="inputUser" required>
            <label for="telefone" class="labelInput">Telefone</label>
        </div>    
        <div class="inputBox">
            <input type="text" name="cidade" id="cidade" class="inputUser" required>
            <label for="cidade" class="labelInput">Cidade</label>
        </div>          
            <input type="password" name="senha" placeholder="Senha" maxlength="8">
            <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="8">
            <input id="submit" type="submit" value="Cadastrar">        
        </form>
        
    </div>
</body>
</html>