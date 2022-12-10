<?php
require_once 'usuario.php';
$u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="stiloteladecadastro.css"/>
	<style>
	.msgResultadoN{
	width: 450px;
    margin: 50px auto 0px;
	padding: 10px;
    text-align: center;
	color: red;
	background-color: rgba(250, 128, 114, .3);
	border: 1px solid rgb(165,42,42);
	}
	#msgResultadoP{
    width: 450px;
    margin: 150px auto 0px auto;
    text-align: center;
	}
	</style>
</head>
<?php
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
		$u->conectar("classificados", "localhost", "root", "");
		if($u->msgErro == ""){
			if($Senha == $confSenha){
				if($u->cadastrar($nome,$cpf,$email,$telefone,$cidade,$Senha)){
					?>					
					<div id="msgResultadoP">
					Cadastrado com sucesso!
					</div>
					<?php
				}else{
					?>
					<div class="msgResultadoN">
					Usuario já possue cadastro!										
					</div>
					<?php					
				}
			}else{
				?>
					<div class="msgResultadoN">
					Senhas não correspondem!
					</div>
					<?php					
			}
		}else{
			?>
					<div class="msgResultadoN">
					<?php echo "Erro: ".$u->msgErro;?>
					</div>
					<?php				
		}
	}else{
		?>
					<div class="msgResultadoN">
					Preencha corretamente todos os campos!
					</div>
					<?php			
	}
}