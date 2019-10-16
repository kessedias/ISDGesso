<?php
// código do kesse
    require_once '../conecta/conexao.php';
    require_once 'autentica.php';

    $sql = "SELECT * FROM rodape_tb";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {

        $linha = mysqli_fetch_assoc($resultado);
    }
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <link rel="stylesheet" href="../style.css" type="text/css">
    <?php require_once '../head.php' ?>
    <title>Administração</title>
</head>

<body>
    <!-- Chamando o cabeçalho do site -->
    <?php require_once 'header.php' ?>

    <!-- Início Conteúdo -->
    <main class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                <table class="table table-hover table-bordered" style="background-color: whitesmoke;">

                    <h2 class="mt-4 text-center">Imagens Rodapé</h2>

                    <p><em>Obs.: Ao executar alterações no rodapé, usar imagens com a mesma resolução nos três campos e acima de 300 pixels.</em></p>
                    <thead class="thead-dark">
                        <tr>

                            <th scope="col">ID</th>
                            <th scope="col">Imagem 1</th>
                            <th scope="col">Imagem 2</th>
                            <th scope="col">Imagem 3</th>
                            <th scope="col">Imagem 4</th>
                            <th scope="col">Imagem 5</th>
                            <th scope="col">Imagem 6</th>
                            <th scope="col">&nbsp;</th>
                        </tr>
                    </thead>
                        <tr>

                            <th scope="row"><?= $linha['id_rod']?></th>
                            <td><?= $linha['imgi']?></td>
                            <td><?=$linha['imgii']?></td>
                            <td><?=$linha['imgiii']?></td>
                            <td><?=$linha['imgiv']?></td>
                            <td><?=$linha['imgv']?></td>
                            <td><?=$linha['imgvi']?></td>

                            <td>
                                <a href="footer_alterar.php?id_rod=<?= $linha['id_rod'];?>" class="btn btn-primary mb-1"><i
                                        class="fas fa-pencil-alt mr-1"></i>Editar</a>

                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>

    </main>
    <!-- Final Conteúdo -->

    <!-- Incluindo os scripts JS do bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>