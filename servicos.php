<?php 
    require_once 'conecta/conexao.php';

    $sql = "SELECT * FROM servicos_tb";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
      $servicos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }else{
      $servicos = [];
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <?php require_once 'head.php' ?>

    <title>Serviços</title>

</head>

<body>

    <?php require_once 'header.php' ?>

    <section class="container mt-2">
        <h1 class="text-center margintop">Serviços da Empresa</h1>
        <?php foreach($servicos as $servico): ?>
        <article class="col-12 mt-2 mb-2 navyblue" id="servhover"> 
            <div class="row">
                <div class="col-5 p-2">
                    <img class= "img-fluid img-thumbnail"src="upload/<?=$servico['img_cont_serv']?>" alt="drywall">
                </div>
                <div class="col-7 p-2">
                    <h3 class="text-center"><?=$servico['titulo_intro_serv'] ?></h3>
                   <p><?=$servico['texto_cont_serv'] ?></p>
                </div>
            </div>
        </article>
        <?php endforeach; ?>
    </section>

    <?php require_once 'footer.php' ?>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

</body>

</html>