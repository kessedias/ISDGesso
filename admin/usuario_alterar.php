<?php
 require_once '../conecta/conexao.php';
 require_once 'autentica.php';

//Verificando s eo formulário foi enviado
if (isset($_POST['op'])) { //Se foi enviado

    $id_usuario = $_POST['id_usuario'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $senha    = $_POST['senha'];
    $tipo     = $_POST['tipo'];


    //Query para dar alterar a noticia
    $sql2 = "UPDATE usuarios_tb  SET nome='$nome', sobrenome='$sobrenome', email='$email', usuario='$usuario', senha='$senha', tipo='$tipo' WHERE id_usuario=$id_usuario";

    $resultado2 = mysqli_query($conexao, $sql2);

    if ($resultado2) { //atualizei o registro
        //Deixar uma mensagem para a camada oito
        $_SESSION['mensagem'] = 'Registro atualizado com sucesso!';
    } else {
        //Mensagem de erro
        $_SESSION['error'] = 'Erro ao executar a ação: '. mysqli_error($conexao);
    }
}

//Se tem o parâmetro id_usuario na URl
if (isset($_GET['id_usuario']) && !empty($_GET['id_usuario'])) {
    $id_usuario = $_GET['id_usuario']; //Copio o valor para var $id_usuario
} else { //Se não estiver
    header('Location: usuario.php'); //redireciona o usuário de volta para o usuario
    exit;
}

$sql = "SELECT * FROM usuarios_tb WHERE id_usuario=$id_usuario";

$resultado = mysqli_query($conexao, $sql);

if ($resultado) { //Se trouxer resultado
    //Converte o resultado em um registro
    $usuario = mysqli_fetch_assoc($resultado);
}
?>
<!DOCTYPE html>

<html lang="pt-br">

<head>

    <link rel="stylesheet" href="../style.css" type="text/css">
    <?php require_once '../head.php'; ?>
    <title>Administração</title>
</head>

<body>
    <!-- Chamando o cabeçalho do site -->
    <?php require_once 'header.php' ?>

    <!-- Início Conteúdo -->
    <main class="container">
        <div class="row mb-5">
            <div class="col-12">

            <h2 class="text-center mt-4">Atualizar usuário</h2>

               <?php include('mensagem.php'); ?>

                <form method="post">
                    <!-- Campo para verificar se o form foi enviado -->
                    <input type="hidden" name="op" value="inserir">
                    <input type="hidden" name="id_usuario" value="<?=$id_usuario?>">

                    <div class="form-group">
                        <label for="campoNome">Digite seu nome:</label>
                        <input value="<?= $usuario['nome'] ?>" required class="form-control" type="text" name="nome" id="campoNome">
                    </div>

                    <div class="form-group">
                        <label for="campoSobrenome">Digite seu sobrenome:</label>
                        <input value="<?= $usuario['sobrenome'] ?>" required class="form-control" type="text" name="sobrenome" id="campoSobrenome">
                    </div>

                    <div class="form-group">
                        <label for="campoEmail">Digite seu e-mail:</label>
                        <input value="<?= $usuario['email'] ?>" required class="form-control" type="email" name="email" id="campoEmail">

                    <!-- Campo Título -->
                    <div class="form-group">
                        <label for="campoUsuario">Digite seu usuario:</label>
                        <input value="<?= $usuario['usuario'] ?>" required class="form-control" type="text" name="usuario" id="campoUsuario">
                    </div>

                    <!-- Campo resumo -->
                    <div class="form-group">
                        <label for="campoSenha">Digite sua senha:</label>
                        <input value="<?= $usuario['senha'] ?>" required class="form-control" type="password" name="senha" id="campoSenha">
                    </div>

                    <!-- Tipo de usuário -->
                    <label for="campoTipo">Tipo de Usuário</label>
                    <select name="tipo" id="campoTipo" class="form-control">
                        <option <?php if ($usuario['tipo'] == 'adm') print 'selected' ?> value="adm">Administrador</option>
                        <option <?php if ($usuario['tipo'] == 'com') print 'selected' ?> value="com">Comum</option>
                    </select>

                    <div class="form-row mt-4">
                        <div class="form-group-group col-6">
                            <button class="btn btn-block btn-primary"><i class="far fa-save mr-2"></i>Salvar</button>
                        </div>
                        <div class="form-group-group col-6">
                            <a href="usuario.php" class="btn btn-block btn-danger"><i class="fas fa-times mr-2"></i>Cancelar</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- // código do kesse -->
</body>

</html>