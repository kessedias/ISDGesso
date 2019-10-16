<?php 
    require_once 'conecta/conexao.php';

    $sql = "SELECT * FROM rodape_tb";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
      $rodape = mysqli_fetch_assoc($resultado);
    }
?>
<!-- //código do kesse -->
<!-- Footer -->
<footer class="page-footer font-small mdb-color lighten-3 pt-4" id="rodape">
  <h4 class="text-center">Placas 3D</h4>
  <!-- Footer Elements -->
  <div class="container">

    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-lg-2 col-md-12 mb-4">

        <!--Image-->
        <div class="view overlay z-depth-1-half">
          <img class="img-thumbnail" src="upload/<?=$rodape['imgi']?>" class="img-fluid"
            alt="">
          <a href="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-2 col-md-6 mb-4">

        <!--Image-->
        <div class="view overlay z-depth-1-half">
          <img class="img-thumbnail" src="upload/<?=$rodape['imgii']?>" class="img-fluid"
            alt="">
          <a href="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-2 col-md-6 mb-4">

        <!--Image-->
        <div class="view overlay z-depth-1-half">
          <img class="img-thumbnail" src="upload/<?=$rodape['imgiii']?>" class="img-fluid"
            alt="">
          <a href="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-2 col-md-12 mb-4">

        <!--Image-->
        <div class="view overlay z-depth-1-half">
          <img class="img-thumbnail" src="upload/<?=$rodape['imgiv']?>" class="img-fluid"
            alt="">
          <a href="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-2 col-md-6 mb-4">

        <!--Image-->
        <div class="view overlay z-depth-1-half">
          <img class="img-thumbnail" src="upload/<?=$rodape['imgv']?>" class="img-fluid"
            alt="">
          <a href="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-2 col-md-6 mb-4">

        <!--Image-->
        <div class="view overlay z-depth-1-half">
          <img class="img-thumbnail" src="upload/<?=$rodape['imgvi']?>" class="img-fluid"
            alt="">
          <a href="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3"> 
   &copy;Copyright 2019 - <a href="contato.php" class="link">ISD Gesso</a> - Todos os direitos reservados
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->