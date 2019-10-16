<?php 
    require_once 'conecta/conexao.php';

    $sql = "SELECT * FROM contato";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
      $contato = mysqli_fetch_assoc($resultado);
    }

    //código do kesse
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <?php require_once 'head.php'; ?>
    <title>Contato</title>

</head>

<body>

    <?php require_once 'header.php'; ?>

    <section class="container mt-3">
        <h1 class="text-center margintop">Entre em contato conosco!</h1>
        <div class="row">
            <div class="col-sm-12 col-md-6 mb-2 mt-2 text-bold">
                <p>Empresa: <?=$contato['nome_emp_cont'] ?></p>
                <br>
                <p>CNPJ: <?=$contato['cnpj_cont'] ?></p>
                <br>
                <p>E-mail: <?=$contato['email_cont'] ?></p>
                <br>
                <p>Telefone: <?=$contato['tel_cont'] ?></p>
                <br>
                <p>Responsáveis: <?=$contato['resp_cont'] ?></p>
            </div>

            <div class="col-sm-12 col-md-6 mt-2 mb-2">
                <iframe style="width: 450px; height: 450px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3679.9924773107186!2d-47.64789544900533!3d-22.728520985029757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c631a09ac7b2e1%3A0x197834b105f878e3!2sSenac+Piracicaba!5e0!3m2!1spt-BR!2sbr!4v1562111084455!5m2!1spt-BR!2sbr" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <?php require_once 'footer.php'; ?>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>