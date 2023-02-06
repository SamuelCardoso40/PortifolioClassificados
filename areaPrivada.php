<?php

//print_r($_REQUEST);
session_start();
if (!isset($_SESSION['Id_Usuario'])){
    header("location: areaPrivada.php");
    exit;
}else{
    header("location: index.php");
}

?>

seja bem vindo