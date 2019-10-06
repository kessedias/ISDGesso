<?php 
session_start();

//Se estiver definido usuário na sessão
if(isset($_SESSION['id_usuario'])){ // o usuário estará autenticado

    if($_SESSION['tipo'] != 'adm' && $_SESSION['tipo'] != 'com'){
        header('Location: login.php');
        exit;
    }
    
}else{//Se não estiver logado
    header('Location: login.php');
    exit;
}