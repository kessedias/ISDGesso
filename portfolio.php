<?php 
    require_once 'conecta/conexao.php';

    $sql = "SELECT * FROM portfolio_tb";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
      $prestado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }else{
      $prestado = [];
    }
    //código do kesse
?>
<!DOCTYPE html>

<html lang="pt-br">

<head>

    <?php require_once 'head.php'?>
    <title>Portfólio</title>

</head>

<body>

    <?php require_once 'header.php' ?>

<section class="container">
    <h1 class="text-center margintop">Portfólio da <span class="navycolor text-bold">ISD Gesso</span></h1>
    <div class="row">

        <?php foreach ($prestado as $portfolio):?>
        <article class="col-12 mb-2 mt-2" id="servhover">
            <div class="row">
                <div class="col-6 lightgray navyblue p-2">
                    <h2 class="whitesmoke text-center"><?=$portfolio['titulo_emp_port'] ?></h2>
                    <img class="img-thumbnail rounded mx-auto d-block" src="upload/<?=$portfolio['img_emp_port']?>" alt="empresa">
                </div>
                <div  class="col-6 lightgray navyblue p-2">
                    <img class="teste img-thumbnail rounded mx-auto d-block" src="upload/<?=$portfolio['img_serv_port']?>" alt="obra">
                    <h2 class="whitesmoke text-center mt-2"><?=$portfolio['nome_serv_port'] ?></h2>
                </div>
            </div>
        </article>
        <?php endforeach; ?>
    </div>
</section>

    <?php require_once 'footer.php' ?>
    
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>