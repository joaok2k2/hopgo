<?php
    require_once 'class/users.php';
    $n = new Usuario;
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
        <div class="login">
            <h1>Login</h1>
            <form method="POST">
                <input type="email" name="email" placeholder="CPF">
                <input type="password" name="senha" placeholder="Senha">
                <input type="submit" value="Login">
                <a href="cadastrar.php" target="_self">Ainda não é inscrito?<strong> Cadastre-se</strong></a>
            </form>
        </div>
        <?php
           if(isset($_POST['email'])){
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            //validação  de campos para que nao esteja nenhum vazio.

            if(!empty($email) && !empty($senha))
            {
                // Conectando no banco
                $n->conectar("projeto_login", "localhost", "root", "joao");
                
                // Caso retorne true, fazer login.
                if($n->msgErro == ""){
                    
                    if($n->login($email, $senha))
                    {
                        header("location: area_privada.php");    
                    }
                    else
                    {
                        ?>
                        <div class="msg-erro">
                            Email e/ou senha estão incorretos!
                        </div>
                        <?php
                    }
                }else{
                    ?>
                    <div class="msg-erro">
                        <?php echo "Mesangem de erro".$n->msgErro; ?>
                    </div>
                    <?php
                }
            }else{
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