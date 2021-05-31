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
            <form method="POST" action="process.php">
                <input type="email" name="email" placeholder="CPF">
                <input type="password" name="senha" placeholder="Senha">
                <input type="submit" value="Login">
                <a href="cadastrar.php" target="_self">Ainda não é inscrito?<strong> Cadastre-se</strong></a>
            </form>
        </div>
        <?php
        
        
        ?>
    </body>
</html>