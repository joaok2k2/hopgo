<?php

class Usuario{

    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha){
        global $pdo;
        global $msgErro;
        try {
            $pdo = new PDO("mysql:dbname={$nome};host={$host};", $usuario, $senha);
            
        } catch (PDOException $th) {
            $msgErro = $th-> getMessage();
        }
    }

    public function cadastrar($nome, $telefone, $email, $senha){
        
        // Verificar se já é cadastrado
        global $pdo;
        $sql = $pdo->prepare("SELECT id_usuário FROM usuarios WHERE email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            return false; // ja esta cadastrado
        }else{
            // Caso não, cadastramento
            $sql = $pdo->prepare("INSERT INTO usuarios(nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", $senha);
            $sql->execute();
            return true;
        }
    }

    public function login($email, $senha){
        global $pdo;






    }
}