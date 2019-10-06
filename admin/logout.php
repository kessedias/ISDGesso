<?php
    session_start(); //Inicia sessão

    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    unset($_SESSION['tipo']);

    session_destroy(); //Destrói a sessão, limpando todos os valores salvos
    header('Location: ../index.php');

    
?>