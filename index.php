<?php
require_once 'usuario.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cidade Conectada</title>
    <link rel="stylesheet" href="stiloteladecadastro.css"/>
    
</head>
<body>
<div id="corpo-formulario">
    <h1>Descubra o melhor da sua cidade</h1>
    <form action="" method="POST">
        <input type="email" placeholder="Usuário" name="email">
        <input type="password" placeholder="Senha" name="senha">
        <input id="submit" type="submit" value="Acessar">
        <a href="http://localhost/classificados/cadastro.php">Ainda não tem cadastro?<strong> Clique Aqui!</strong></a>
    </form>
</div>
</body>
</html>