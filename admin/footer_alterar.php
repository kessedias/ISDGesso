<?php
    require_once '../conecta/conexao.php';
    require_once 'autentica.php';

    if(isset($_POST['op'])){

        $id_rod           = $_POST['id_rod'];
        //$imgi           = $_POST['imgi'];
        //$imgii           = $_POST['imgii'];
        //$imgiii           = $_POST['imgiii'];
        //$imgiv          = $_POST['imgiv'];
        //$imgv           = $_POST['imgv'];
        //$imgvi           = $_POST['imgvi'];
       
        //IMAGEM UM
        // Se estiver definido o campo imagem
    if(isset($_FILES['imgi']) && $_FILES['imgi']['error'] ==0) {

        $imgi = $_FILES['imgi']['name'];


        //  Aqui obtenho a extensao do arquivo original
        $ext = explode('.', $imgi)[1];


        //  cria um nome criptografado, se estiver com o nome repetido
        $novo_nome = 'f'. md5(time());

        // Ajusto o nome correto da imagem antes de salvar np banco
        $imgi = "$novo_nome.$ext";
    

        //  Move o arquivo para a pasta desejada
        move_uploaded_file($_FILES['imgi']['tmp_name'], "../upload/$imgi");
    }else{
        $imgi = $_POST['oldImg1'];
    }

     //IMAGEM DOIS
        // Se estiver definido o campo imagem
        if(isset($_FILES['imgii']) && $_FILES['imgii']['error'] ==0) {

            $imgii = $_FILES['imgii']['name'];
    
    
            //  Aqui obtenho a extensao do arquivo original
            $ext = explode('.', $imgii)[1];
    
    
            //  cria um nome criptografado, se estiver com o nome repetido
            $novo_nome =  'g'. md5(time());
    
            // Ajusto o nome correto da imagem antes de salvar np banco
            $imgii = "$novo_nome.$ext";
        
    
            //  Move o arquivo para a pasta desejada
            move_uploaded_file($_FILES['imgii']['tmp_name'], "../upload/$imgii");
        }else{
            $imgii = $_POST['oldImg2'];
        }

        //IMAGEM TRÊS
        // Se estiver definido o campo imagem
        if(isset($_FILES['imgiii']) && $_FILES['imgiii']['error'] ==0) {

            $imgiii = $_FILES['imgiii']['name'];
    
    
            //  Aqui obtenho a extensao do arquivo original
            $ext = explode('.', $imgiii)[1];
    
    
            //  cria um nome criptografado, se estiver com o nome repetido
            $novo_nome =  'h'. md5(time());
    
            // Ajusto o nome correto da imagem antes de salvar np banco
            $imgiii = "$novo_nome.$ext";
        
    
            //  Move o arquivo para a pasta desejada
            move_uploaded_file($_FILES['imgiii']['tmp_name'], "../upload/$imgiii");
        }else{
            $imgiii = $_POST['oldImg3'];
        }

        //IMAGEM QUATRO
        // Se estiver definido o campo imagem
        if(isset($_FILES['imgiv']) && $_FILES['imgiv']['error'] ==0) {

            $imgiv = $_FILES['imgiv']['name'];
    
    
            //  Aqui obtenho a extensao do arquivo original
            $ext = explode('.', $imgiv)[1];
    
    
            //  cria um nome criptografado, se estiver com o nome repetido
            $novo_nome =  'i'. md5(time());
    
            // Ajusto o nome correto da imagem antes de salvar np banco
            $imgiii = "$novo_nome.$ext";
        
    
            //  Move o arquivo para a pasta desejada
            move_uploaded_file($_FILES['imgiv']['tmp_name'], "../upload/$imgiv");
        }else{
            $imgiv = $_POST['oldImg4'];
        }

        //IMAGEM CINCO
        // Se estiver definido o campo imagem
        if(isset($_FILES['imgv']) && $_FILES['imgv']['error'] ==0) {

            $imgv = $_FILES['imgv']['name'];
    
    
            //  Aqui obtenho a extensao do arquivo original
            $ext = explode('.', $imgv)[1];
    
    
            //  cria um nome criptografado, se estiver com o nome repetido
            $novo_nome =  'j'.  md5(time());
    
            // Ajusto o nome correto da imagem antes de salvar np banco
            $imgv = "$novo_nome.$ext";
        
    
            //  Move o arquivo para a pasta desejada
            move_uploaded_file($_FILES['imgv']['tmp_name'], "../upload/$imgv");
        }else{
            $imgv = $_POST['oldImg5'];
        }

        //IMAGEM SEIS
        // Se estiver definido o campo imagem
        if(isset($_FILES['imgvi']) && $_FILES['imgvi']['error'] ==0) {

            $imgvi = $_FILES['imgvi']['name'];
    
    
            //  Aqui obtenho a extensao do arquivo original
            $ext = explode('.', $imgvi)[1];
    
    
            //  cria um nome criptografado, se estiver com o nome repetido
            $novo_nome = 'k'. md5(time());
    
            // Ajusto o nome correto da imagem antes de salvar np banco
            $imgvi = "$novo_nome.$ext";
        
    
            //  Move o arquivo para a pasta desejada
            move_uploaded_file($_FILES['imgvi']['tmp_name'], "../upload/$imgvi");
        }else{
            $imgvi = $_POST['oldImg6'];
        }

         //$imgi = mysqli_real_escape_string($conexao, $imgi);
         //$imgii = mysqli_real_escape_string($conexao, $imgii);
        //$imgiii = mysqli_real_escape_string($conexao, $imgiii);
        //$imgiv = mysqli_real_escape_string($conexao, $imgiv);
        //$imgv = mysqli_real_escape_string($conexao, $imgv);
        //$imgvi = mysqli_real_escape_string($conexao, $imgvi);
       

        $sql = "UPDATE rodape_tb SET imgi='$imgi', imgii='$imgii', imgiii='$imgiii', imgiv='$imgiv', imgv='$imgv', imgvi='$imgvi' where id_rod=$id_rod";
        //var_dump($sql);
        $resultado = mysqli_query($conexao, $sql);
       // var_dump($resultado);

        if($resultado){
          $mensagem = 'Registro atualizado com sucesso.';
        }else {
            $error = 'Erro ao executar a alteração: '. mysqli_error($conexao);
        }
    }
    
    //Se tem o parâmetro id na URL
if (isset($_GET['id_rod']) && !empty($_GET['id_rod']) && !($_GET['id_rod'] > 1)) {
    $id_rod = $_GET['id_rod']; //Copio o valor para var $id_rod
} else { //Se não estiver
    header('Location: footer.php'); //redireciona o usuário de volta para o footer
    exit;
}

$sql2 = "SELECT * FROM rodape_tb WHERE id_rod =$id_rod";

$resultado2 = mysqli_query($conexao, $sql2);

if ($resultado2) {
    $rodape = mysqli_fetch_assoc($resultado2);
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
    <?php require_once 'header.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-center mt-4">Atualizar Serviço</h2>

                <?php if(isset($mensagem)): ?>
                <div class="alert alert-success">
                        <?= $mensagem ?>
                </div>
                    <?php endif; ?>

                    <?php if(isset($error)): ?>
                <div class="alert alert-danger">
                        <?= $error ?>
                </div>
                    <?php endif; ?>

                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="op" value="update">
                    <input type="hidden" name="oldImg1" value="<?=$rodape['imgi']?>">
                    <input type="hidden" name="oldImg2" value="<?=$rodape['imgii']?>">
                    <input type="hidden" name="oldImg3" value="<?=$rodape['imgiii']?>">
                    <input type="hidden" name="oldImg4" value="<?=$rodape['imgiv']?>">
                    <input type="hidden" name="oldImg5" value="<?=$rodape['imgv']?>">
                    <input type="hidden" name="oldImg6" value="<?=$rodape['imgvi']?>">
                    <input type="hidden" name="id_rod" value="<?= $id_rod?>">



                    <!-- Título intro Serviço -->
                    <div class="form-group">
                        <label for="imagemI">Imagem 1:</label>
                        <input class="form-control" type="file" name="imgi" id="imagemI">
                    </div>
                    <div class="form-group">
                        <label for="imagemII">Imagem 2:</label>
                        <input class="form-control" type="file" name="imgii" id="imagemII">
                    </div>
                    <div class="form-group">
                        <label for="imagemIII">Imagem 3:</label>
                        <input class="form-control" type="file" name="imgiii" id="imagemIII">
                    </div>
                    <div class="form-group">
                        <label for="imagemIV">Imagem 4:</label>
                        <input class="form-control" type="file" name="imgiv" id="imagemIV">
                    </div>
                    <div class="form-group">
                        <label for="imagemV">Imagem 5:</label>
                        <input class="form-control" type="file" name="imgv" id="imagemV">
                    </div>
                    <div class="form-group">
                        <label for="imagemVI">Imagem 6:</label>
                        <input class="form-control" type="file" name="imgvi" id="imagemVI">
                    </div>
                   
                    <!-- Botões -->
                    <div class="form-row">
                        <div class="form-group-group col-6">
                            <button class="btn btn-block btn-success"><i class="far fa-save mr-2"></i>Salvar</button>        
                        </div>
                        <div class="form-group-group col-6">
                            <a href="footer.php" class="btn btn-block btn-secondary"><i class="fas fa-times mr-2"></i>Cancelar</a>        
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>

</html>