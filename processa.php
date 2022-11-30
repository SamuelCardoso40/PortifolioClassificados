<?php

require_once 'usuario.php';
$u = new Usuario;

if(isset($_POST['nome'])){
	$nome = addslashes($_POST['nome']);
	$cpf = addslashes($_POST['cpf']);
	$email = addslashes($_POST['email']);
	$telefone = addslashes($_POST['telefone']);
	$cidade = addslashes($_POST['cidade']);
	$Senha = addslashes($_POST['senha']);
	$confSenha = addslashes($_POST['confSenha']);
	//verificar preenchimento
	if(!empty($nome) && !empty($cpf) && !empty($email) && !empty($telefone)
	&& !empty($cidade) && !empty($Senha) && !empty($confSenha)){
		$u->conectar("classificados", "localhost", "hoot", "");
		if($u->msgErro == ""){
			if($Senha == $confSenha){
				if($u->cadastrar($nome,$cpf,$email,$telefone,$cidade,$Senha)){
					echo "Cadastrado com sucesso!";
				}else{
					echo "Usuario já possue cadastro!";
				}
			}else{
				echo "Senhas não correspondem!";
			}
		}else{
			echo "Erro: ".$u->msgErro;
		}
	}else{
		echo "Preencha corretamente todos os campos!";
	}
}