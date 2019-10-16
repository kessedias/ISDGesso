<?php 
    require_once 'conecta/conexao.php';

    $sql = "SELECT * FROM sobre_tb";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
      $sobre = mysqli_fetch_assoc($resultado);
    }
    //código do kesse
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <?php require_once 'head.php' ?>
    <title>Sobre Nós</title>
</head>

<body>

 <?php require_once 'header.php' ?>

 <section class="container mt-2">
     <h1 class="text-center margintop"><?=$sobre['titulo_sob'] ?></h1>
     <div class="row">
         <div class="col-12">
             <p><?=$sobre['texto_ini_sob'] ?></p>
         </div>
         <div class="col-12 mt-2 mb-2">
             <div class="row">
                 <div class="col-md-9 col-sm-6">
                    <img class="img-fluid" src="upload/<?=$sobre['img_sob']?>" alt="teste">
                 </div>
                 <div class="col-md-3 col-sm-6">
                        <p><?=$sobre['text_fim_sob'] ?></p>
                 </div>
             </div>
         </div>

     </div>

 </section>

 <?php require_once 'footer.php' ?>

  <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>

</html>