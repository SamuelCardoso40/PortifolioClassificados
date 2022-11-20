<?php
class usuario {   
    private $pdo;
    public $msgErro = "";
    public function conectar($dbnome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;
        try {
            $pdo = new PDO("mysql:dbname=".$dbnome.";host=".$host,$usuario,$senha);        
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
        
}
    public function cadastrar($nome, $cpf, $email, $telefone, $cidade, $senha){

        global $pdo;
        global $msgErro;
        //Verificação do cadastro
        $sql = $pdo->prepare("SELECT ID_Usuario FROM tb_usuario WHERE email = :e");
        $sql-> bindValue (":e", $email);
        $sql->execute();
        if ($sql->rowCount() > 0 ){
            return false;
        } else{
            $sql = $pdo->prepare("INSERT INTO Tb_Usuario (Nome_Usuario, cpf, email, telefone, cidade, senha) VALUES (:n, :c, :e, :t, :l, :s");
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
        global $msgErro;
        $sql = $pdo->prepare("SELECT ID_Usuario FROM tb_usuario WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();

        if ($sql->rowCount() > 0 ){
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