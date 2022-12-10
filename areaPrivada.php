<?php
session_start();
if (!isset($_SESSION['Id_Usuario'])){
    header("location: index.php");
    exit;
}

?>

seja bem vindo