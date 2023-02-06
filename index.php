<?php
require_once 'usuario.php';
$u = new Usuario
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cidade Conectada</title>
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
<body>
<div id="corpo-formulario">
    <h1>Descubra o melhor da sua cidade</h1>
    <form action="areaPrivada.php" method="POST">
        <input type="email" placeholder="Email" name="email">
        <input type="password" placeholder="Senha" name="senha">
        <input id="submit" type="submit" value="Acessar">
        <a href="http://localhost/classificados/cadastro.php">Ainda não tem cadastro?<strong> Clique Aqui!</strong></a>
    </form>
</div>
<?php 
if(isset($_POST['email'])){	
	$email = addslashes($_POST['email']);	
	$Senha = addslashes($_POST['senha']);	
	//verificar preenchimento
	if(!empty($email) && !empty($Senha)){
		$u->conectar($name, $host, $usuario, $senha);
		if($u->msgErro == ""){			
				if($u->logar($email,$Senha)){
                    header("location: areaPrivada.php");					
				}else{
					?>
					<div class="msgResultadoN">
					Algum dado incorreto!										
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
?>
</body>
</html>