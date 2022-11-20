<?php

  session_start();
  if (!isset($_SESSION['ID_Usuario'])) {  //se não está definido o id do usuario na sessao
    header("location:cadastro.php");
    die();
  }
?>

<h1>Bem Vindo a sua area privada!!</h1>
<a href="sair.php">Sair</a>