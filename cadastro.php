<?php
    require_once 'usuario.php';
    $u = new usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cidade Conectada</title>
    <!-- Acesso externo comentado-->
    <!--<link rel="stylesheet" href="styles_classificados.css"/>--> 
    <!--<script src="ProjetoClassificados.js" defer></script>--> 
    <!-- Adicionado o script INTERNO para melhor visualização-->
</head>
<script>

</script>
<!-- Assim como o script, o estilo foi adicionado aqui para melhor visualização-->
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        
    }
    body{        
        background: linear-gradient(rgba(0,0,0, 0.7), rgba(0,0,0,0.7)), url(img2.jpg);
        background-position: center;
        background-size: cover;
    }
    input{
        display: block;
        height: 55px;
        width: 400px;
        margin: 10px;
        border-radius: 30px;
        border: 1px solid white;
        font-size: 15pt;
        padding-left: 15px;
        background-color: rgba(255, 255, 255, 0.01);
        color: aliceblue;
    }       
    #corpo-formulario{        
        width: 450px;
        margin: 60px auto 0px auto;
        text-align: justify;
    }
    h1{        
        text-transform: uppercase;
        color: aliceblue;
        font-family: Helvetica, sans-serif;
        padding: 20px;      
    }    
    input#submit{
        background: linear-gradient(180deg, rgba(32, 65, 43, 0.533), rgba(106, 153, 168, 0.6)); 
        color: white;        
        cursor: pointer;
        border-radius: 30px;
        
    }
    #submit:hover{
        background-image: linear-gradient(to right,rgb(5, 5, 5), rgb(26, 77, 28));
    }
    .inputBox {
        position: relative;
        padding-top: 3px;
    }
    .inputUser{ 
        font-size: 15px;        
        letter-spacing: 2px;
    }
    .labelInput{
        font-size: 15px;  
        position: absolute;
        top: 20px;
        left: 22px;
        pointer-events: none;
        transition: .5s;
        color: white;
    }
    .inputUser:focus ~ .labelInput,
    .inputUser:valid ~ .labelInput{
        top: -5px;
        font-size: 12px;
        color: white;
    }

</style>
<body>
<div id="corpo-formulario">
    <h1>cadastro de usuário</h1>
    <form method="POST" >        
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
<!-- Parte da orientação objeto foi adicionado aqui para melhor visualização-->
<?php
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
        $u-> conectar("classificados", "localhost", "root", "");
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
</body>
</html>