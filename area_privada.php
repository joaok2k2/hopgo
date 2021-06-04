<?php

    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header("location: index.php");
        exit;
    }
?>



<h1> Seja BEM VINDO!<h1>

<a href="kill.php">Sair</a>