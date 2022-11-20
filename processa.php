<?php
require_once 'usuario.php';
$u = new usuario;
if(isset ($_POST['nome'])){
    $nome = addslashes($_POST['nome']);
    $cpf = addslashes($_POST['cpf']);
    $email = addslashes($_POST['email']);
    $telefone = addslashes($_POST['telefone']);
    $cidade = addslashes($_POST['cidade']);
    $senha = addslashes($_POST['senha']);
    $confSenha = addslashes($_POST['confSenha']);
    if (!empty($nome) && !empty($cpf) && !empty($email) && !empty($telefone) && 
    !empty($cidade) && !empty($senha) && !empty($confSenha))
    {
        include_once('usuario.php');
        $u->conectar("classificados", "localhost", "root", "");
        if ($u->msgErro == "")
        {   
            if($senha == $confSenha){
                if($u->cadastrar($nome, $cpf, $email, $telefone, $cidade, $senha)){
                    echo "Cadastrado com sucesso!";
                } else{
                    echo "E-Mail já está cadastrado";
                }
            } else {
                echo "Senha não corresponde!";
            }            
        }
    } else {

        echo "Preencha corretamente o formulário!";
    }
}
?>