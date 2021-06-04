<?php
    //Instanciando a classe users
    require_once 'class/users.php';
    $u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css"> 
        <!-- Ícones -->
        <link href="img/hospI.ico" rel="icon" type="image/x-icon">
        <title>HospGo!</title>
    </head>
    <body>
        <div class="login_cad">
            <h1>Cadastrar</h1>
            <form method="POST">
                <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
                <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
                <input type="email" name="email" placeholder="E-mail" maxlength="40">
                <input type="password" name="senha" placeholder="Senha" maxlegnth="15">
                <input type="password" name="confirm_senha" placeholder="Confirmar Senha" maxlength="15">
                <input type="submit" value="Cadastrar">
            </form>
        </div>
        <?php
            // verificando se a variavel foi inicializada, caso true, criar variaveis para guardas os outros inseridos.
            if(isset($_POST['nome'])){
                $nome = addslashes($_POST['nome']);
                $telefone = addslashes($_POST['telefone']);
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);
                $confirma_senha = addslashes($_POST['confirm_senha']);

                //validação  de campos para que nao esteja nenhum vazio.

                if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirma_senha)){
                    // Conectando com o banco

                    $u->conectar("projeto_login", "localhost", "root", "joao");
                    
                    //Tetando conexeão com o banco, caso estaja ok, proceguir com o cadastramento
                    
                    if($u->msgErro == ""){
                        // Validando se o campo senha é o mesmo do confirmar senha.
                        if($senha == $confirma_senha){
                            
                            // Procesguindo com o cadastramento.
                            // Caso True, o cadastramento foi ok.
                            if($u->cadastrar($nome, $telefone, $email, $senha)){
                                ?> 
                                <div class="msg-sucesso">
                                Cadastrado com sucesso! 
                                </div>
                                <div class="msg-sucesso">
                                Clique abaixo para entrar!
                                <a href="index.php">login</a>
                                </div>
                                
                                <?php

                            }else{
                                // Caso false, já está cadastrado.
                                ?>
                                <div class="msg-erro">
                                   Ja está cadastrado!
                                </div>
                                <?php
                            }
                            
                        }else{
                            // Os campos são diferentes!
                            ?> 
                            <div class="msg-erro">
                            Senha e confirmar senha não correspondem!
                            </div>
                            <?php
                        }
                    }
                    // Erro na conexão com o banco
                    else{
                        ?>
                        <div class="msg-erro">
                            <?php echo "Erro" .$u->msgErro; ?>
                        </div>
                        <?php
                    }

                }
                else{
                    // Caso esteja algum campo vazio
                    ?>
                    <div class="msg-erro">
                       Preencha todos os campos!
                    </div>
                    <?php
                }
                    
            }
        
        ?>

    </body>
</html>