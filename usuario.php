<?php

Class Usuario{
    private $pdo;
    public $msgErro = "";
    public function conectar($name, $host, $usuario, $senha){
        global $pdo;
        global $msgErro;
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=classificados", "root", "");
        }catch(PDOException $e){
            $msgErro = $e->getMessage();
        }
        
    }
    public function cadastrar($nome, $cpf, $email, $telefone, $cidade, $senha){
        global $pdo;
        global $msgErro;
        //verificar registro
        $conex = "SELECT ID_Usuario FROM tb_usuario WHERE email=:e";
        $sql = $pdo->prepare($conex);
        $sql->bindValue(":e", $email);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false; //já tem cadastro
        }else{
            $sql = $pdo->prepare("INSERT INTO tb_usuario (Nome_Usuario, cpf, email, telefone, Cidade, Senha) VALUES (:n, :c, :e, :t, :l, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":c", $cpf);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":l", $cidade);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            return true;
        }
        
    }
    public function logar($email, $senha){
        global $pdo;
        global $msgErro;
        //verificar email e senha para logar
        $sql = $pdo->prepare("SELECT ID_Usuario FROM tb_usuario WHERE email=:e AND Senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0){
            //entrar na sessão
            $dado = $sql->fetch();
            session_start();
            $_SESSION['Id_Usuario'] = $dado['Id_Usuario'];
            return true; //logado com sucesso
        }else{
            return false;
        }
    }
}