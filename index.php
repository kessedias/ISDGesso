<?php 
    require_once 'conecta/conexao.php';

    $sql = "SELECT * FROM servicos_tb";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
      $servicos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }else{
      $servicos = [];
    }

    $sql2 = "SELECT * FROM banner_tb";

    $resultado2 = mysqli_query($conexao, $sql2);

    if ($resultado2) {
      $banner = mysqli_fetch_assoc($resultado2);
    }
    //código do kesse
?>
<!DOCTYPE html>

<html lang="pt-br">

<head>

  <?php require_once 'head.php';?>
  <title>ISD Gesso</title>

</head>

<body>
   <?php require_once 'header.php'; ?>
  <!-- BANNER -->

  <header id="carousel" class="carousel slide margintop" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel" data-slide-to="0" class="active"></li>
      <li data-target="#carousel" data-slide-to="1"></li>
      <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="upload/<?=$banner['imgi_ban']?>" alt="Primeiro Slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="upload/<?=$banner['imgii_ban']?>">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="upload/<?=$banner['imgiii_ban']?>" alt="Terceiro Slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Próximo</span>
    </a>
  </header>
  <!-- FECHA BANNER -->

  <!-- CONTEUDO SERVIÇOS -->
  <section class="container lightgray mb-1">
    <h2 class="text-center text-bold mt-4">Serviços</h2>
    <div class="row">
      <?php foreach ($servicos as $servico): ?>
      <article class="col-12 navyblue mt-2 mb-1 servicos" id="servhover">
        <div class="row">
          <div class="col-4 p-2"><a href="servicos.php" target="_self"><img class="img-thumbnail" src="upload/<?=$servico['img_intro_serv']?>" alt="teste"></a></div>
          <div class="col-8">
          <a class="linktitulo" href="servicos.php" target="_self"><h3 class="text-center pt-1"><?=$servico['titulo_intro_serv'] ?></h3></a>
          <?=$servico['resumo_intro_serv'];?>
          </div>
        </div>
      </article>
     <?php endforeach; ?>

    </div>
  </section>
  <!-- FECHA CONTEUDO SERVIÇOS -->

   <?php require_once 'footer.php'; ?>

  <!-- JavaScript (Opcional) -->
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>