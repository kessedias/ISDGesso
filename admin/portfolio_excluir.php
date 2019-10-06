<?php
require_once '../conecta/conexao.php';
require_once 'autentica.php';

if (isset($_POST['op'])) {

    $id_port = $_POST['id_port'];

    $sql2 = "DELETE FROM portfolio_tb WHERE id_port=$id_port";

    $resultado2 = mysqli_query($conexao, $sql2);

    //var_dump($resultado2);
    if ($resultado2) {
        header('Location: portfolio.php');
        exit;
    }
}
//Verifica se o $Id ta definido na URL
if (isset($_GET['id_port']) && !empty($_GET['id_port'])) {
    $id_port = $_GET['id_port'];

    $sql = "SELECT nome_serv_port FROM portfolio_tb WHERE id_port=$id_port";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        $portfolio = mysqli_fetch_assoc($resultado);
        $portfolio = $portfolio['nome_serv_port'];
        $_SESSION['mensagem'] = 'Registro removido com sucesso.';
    }
} else { //Se não estiver
    // Redireciona o usuário para a pagina do adm
    header('Location: portfolio.php');
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
                    <input type="hidden" name="id_port" value="<?= $id_port ?>">
                    <div style="display: block; position: relative;" class="modal show" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="fas fa-exclamation-triangle mr-3"></i>Confirmar Exclusão</h5>

                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Tem certeza que deseja excluir o serviço prestado: <strong><?=$portfolio ?>?</strong></p>
                                </div>
                                <div class="modal-footer">
                                    <a href="portfolio.php" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Cancelar</a>
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