<?php
class usuario{
    
    private $pdo;
    public $msgErro = "";
    public function conectar($nome, $host, $usuario, $senha){

        global $pdo;
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=classificados", "hoot", "");        
        } catch (PDOException $e) {
            $msgErro = $e -> getMessage();

        }
        
    }
    public function cadastrar($nome, $cpf, $email, $telefone, $cidade, $senha){

        global $pdo;
        //Verificação do cadastro
        $sql = $pdo->prepare("SELECT ID_Usuario FROM tb_usuario WHERE email = :e");
        $sql-> bindValue (":e", $email);
        $sql->execute();
        if ($sql->rowCout() > 0 ){
            return false;
        } else{
            $sql = $pdo->prepare("INSERT INTO tb_usuario (Nome_Usuario, cpf, email, telefone, cidade, senha) VALUES (:n, :c, :e, :t, :l, :s");
            $sql-> bindValue (":n", $nome);
            $sql-> bindValue (":c", $cpf);
            $sql-> bindValue (":e", $email);
            $sql-> bindValue (":t", $telefone);
            $sql-> bindValue (":l", $cidade);
            $sql-> bindValue (":s", md5($senha));
            $sql->execute();
            return true;
        }
    }
    public function logar($email, $senha){

        global $pdo;
        $sql = $pdo->prepare("SELECT ID_Usuario FROM tb_usuario WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();

        if ($sql->rowCout() > 0 ){
            $dado = $sql->fetch();
            session_start();
            $_SESSION['ID_Usuario'] = $dado['ID_Usuario'];
            return true;
        } else {
            return false;        
    }
}
}
?>