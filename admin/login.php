<?php
//Abre sessão com o navegador
session_start();

//Se já tem o id do usuario na sessao
if (isset($_SESSION['id_usuario'])) {
    header('Location: index.php');
    exit;
}

require_once '../conecta/conexao.php';

//Definindo as variáveis
if (isset($_POST['usuario']) && isset($_POST['senha'])) {

    //instanciando
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios_tb WHERE usuario='$usuario' AND senha='$senha'";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) { //Se tiver algum resultado
        //Converte o memso em registro
        $usuario = mysqli_fetch_assoc($resultado);
    }


    if ($usuario) { //Se o usuário for encontrado,

        //Passando a variável do SESSION
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['usuario']   = $usuario['usuario'];
        $_SESSION['tipo']       = $usuario['tipo'];

        //Levando o usuário para a página inicial
        header('Location: index.php');
        exit;
    } else { //Se não encontrar o usuário
        $error = 'Usuário ou senha inválidos.';
    }
} else {
    //$error = 'Ocorreu um erro durante o login.';
}
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <?php require_once '../head.php' ?>
    <title>Login</title>
</head>

<body class="text-center navycolorbg" style="background-color: #042159; color: whitesmoke;">

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4 offset-sm-4">
                <form class="form-signin" method="POST">

                    <img class="mb-4" src="../upload/logo_isd.PNG" alt="logo" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">Faça o seu Login:</h1>

                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger mt-2">
                            <?= $error ?>
                        </div>
                    <?php endif; ?>

                    <label for="campoLogin" class="sr-only">Usuário</label>
                    <input name="usuario" type="text" id="campoLogin" class="form-control mb-3" placeholder="Seu usuário" required autofocus="">
                    <label for="campoSenha" class="sr-only">Senha</label>
                    <input name="senha" type="password" id="campoSenha" class="form-control" placeholder="Sua senha" required>
                    <div class="checkbox mb-3">
                        <!-- <label>
                            <input type="checkbox" value="remember-me"> Lembrar de mim
                        </label> -->
                    </div>
                    <button class="btn btn-lg btn-success btn-block" type="submit">Login</button>
                    <p class="mt-5 mb-3 text-muted">©Copyright 2019 - ISD Gesso</p>

                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>