<?php
require_once '../conecta/conexao.php';
require_once 'autentica.php';

if (isset($_POST['op'])) {

    $id_usuario = $_POST['id_usuario'];

    $sql2 = "DELETE FROM usuarios_tb WHERE id_usuario=$id_usuario";

    $resultado2 = mysqli_query($conexao, $sql2);

    //var_dump($resultado2);
    if ($resultado2) {
        header('Location: usuario.php');
        exit;
    }
}
//Verifica se o $Id ta definido na URL
if (isset($_GET['id_usuario']) && !empty($_GET['id_usuario'])) {
    $id_usuario = $_GET['id_usuario'];

    $sql = "SELECT usuario FROM usuarios_tb WHERE id_usuario=$id_usuario";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        $usuario = mysqli_fetch_assoc($resultado);
        $usuario = $usuario['usuario'];
        $_SESSION['mensagem'] = 'Registro removido com sucesso.';
    }
} else { //Se não estiver
    // Redireciona o usuário para a pagina do adm
    header('Location: usuario.php');
    $_SESSION['error'] = 'Registro não removido.';
    exit;
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
        <div class="row">
            <div class="col-12">´
                <form method="post">
                    <input type="hidden" name="op" value="excluir">
                    <input type="hidden" name="id_usuario" value="<?= $id_usuario ?>">
                    <div style="display: block; position: relative;" class="modal show" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="fas fa-exclamation-triangle mr-3"></i>Confirmar Exclusão</h5>

                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Tem certeza que deseja excluir o usuário: <strong><?=$usuario ?>?</strong></p>
                                </div>
                                <div class="modal-footer">
                                    <a href="usuario.php" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Cancelar</a>
                                    <button class="btn btn-danger"><i class="fas fa-trash mr-1"></i>Deletar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </main>
    <!-- Incluindo os scripts JS do bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>