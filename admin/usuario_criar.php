<?php 
 require_once '../conecta/conexao.php';
 require_once 'autentica.php';

if(isset($_POST['op'])){

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $senha    = $_POST['senha'];
    $tipo     = $_POST['tipo'];

    $sql = "INSERT INTO usuarios_tb VALUES(0, '$nome', '$sobrenome', '$email', '$usuario', '$senha', now(), '$tipo')";

    $resultado = mysqli_query($conexao, $sql);

    //var_dump($resultado);
    if ($resultado) {
        header('Location: usuario.php');
        $_SESSION['mensagem'] = 'Registro criado com sucesso.';
        exit;
    }else {
        $_SESSION['error'] = 'Erro ao executar a ação:' . mysqli_error($conexao);
    } 
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

                <h2 class="text-center mt-4">Criar Usuário</h2>

               <?php include('mensagem.php'); ?>

                <form method="post">
                    <!-- Campo para verificar se o form foi enviado -->
                    <input type="hidden" name="op" value="inserir">
                    <input type="hidden" name="id_usuario" value="<?=$id_usuario?>">

                    <div class="form-group">
                        <label for="campoNome">Digite seu nome:</label>
                        <input required class="form-control" type="text" name="nome" id="campoNome">
                    </div>

                    <div class="form-group">
                        <label for="campoSobrenome">Digite seu sobrenome:</label>
                        <input required class="form-control" type="text" name="sobrenome" id="campoSobrenome">
                    </div>

                    <div class="form-group">
                        <label for="campoEmail">Digite seu e-mail:</label>
                        <input required class="form-control" type="email" name="email" id="campoEmail">

                    <!-- Campo Título -->
                    <div class="form-group">
                        <label for="campoUsuario">Digite seu usuario:</label>
                        <input required class="form-control" type="text" name="usuario" id="campoUsuario">
                    </div>

                    <!-- Campo resumo -->
                    <div class="form-group">
                        <label for="campoSenha">Digite sua senha:</label>
                        <input required class="form-control" type="password" name="senha" id="campoSenha">
                    </div>

                     <!-- Tipo de usuário -->
                     <label for="campoTipo">Tipo de Usuário</label>
                    <select name="tipo" id="campoTipo" class="form-control">
                        <option value="adm">Administrador</option>
                        <option value="com">Comum</option>
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
    
</body>

</html>