<?php
    // código do kesse
    require_once '../conecta/conexao.php';
    require_once 'autentica.php';

    if(isset($_POST['op'])){

        $id_ban           = $_POST['id_ban'];
        //$imgi_ban = $_POST['imgi_ban'];
        //$imgii_ban = $_POST['imgii_ban'];
        //$imgiii_ban    = $_POST['imgiii_ban'];

        //IMAGEM UM
        if(isset($_FILES['imgi_ban']) && $_FILES['imgi_ban']['error'] ==0) {

            $imgi_ban = $_FILES['imgi_ban']['name'];
    
    
            //  Aqui obtenho a extensao do arquivo original
            $ext = explode('.', $imgi_ban)[1];
    
    
            //  cria um nome criptografado, se estiver com o nome repetido
            $novo_nome = 'g'. md5(time());
    
            // Ajusto o nome correto da imagem antes de salvar np banco
            $imgi_ban = "$novo_nome.$ext";
        
            //  Move o arquivo para a pasta desejada
            move_uploaded_file($_FILES['imgi_ban']['tmp_name'], "../upload/$imgi_ban");
        }else{
            $imgi_ban = $_POST['oldImg1'];
        }

        //IMAGEM DOIS
        if(isset($_FILES['imgii_ban']) && $_FILES['imgii_ban']['error'] ==0) {

            $imgii_ban = $_FILES['imgii_ban']['name'];
    
    
            //  Aqui obtenho a extensao do arquivo original
            $ext = explode('.', $imgii_ban)[1];
    
    
            //  cria um nome criptografado, se estiver com o nome repetido
            $novo_nome = 'h'. md5(time());
    
            // Ajusto o nome correto da imagem antes de salvar np banco
            $imgii_ban = "$novo_nome.$ext";
        
            //  Move o arquivo para a pasta desejada
            move_uploaded_file($_FILES['imgii_ban']['tmp_name'], "../upload/$imgii_ban");
        }else{
            $imgii_ban = $_POST['oldImg2'];
        }

        //IMAGEM TRÊS
        if(isset($_FILES['imgiii_ban']) && $_FILES['imgiii_ban']['error'] ==0) {

            $imgiii_ban = $_FILES['imgiii_ban']['name'];
    
    
            //  Aqui obtenho a extensao do arquivo original
            $ext = explode('.', $imgiii_ban)[1];
    
    
            //  cria um nome criptografado, se estiver com o nome repetido
            $novo_nome = 'z'. md5(time());
    
            // Ajusto o nome correto da imagem antes de salvar np banco
            $imgiii_ban = "$novo_nome.$ext";
        
            //  Move o arquivo para a pasta desejada
            move_uploaded_file($_FILES['imgiii_ban']['tmp_name'], "../upload/$imgiii_ban");
        }else{
            $imgiii_ban = $_POST['oldImg3'];
        }
        

        //$imgi_ban = mysqli_real_escape_string($conexao, $imgi_ban);
        //$imgii_ban = mysqli_real_escape_string($conexao, $imgii_ban);
        //$imgiii_ban    = mysqli_real_escape_string($conexao, $imgiii_ban);

        $sql = "UPDATE banner_tb SET imgi_ban='$imgi_ban', imgii_ban='$imgii_ban', imgiii_ban='$imgiii_ban', data_update_ban=NOW() where id_ban=$id_ban";
        //var_dump($sql);
  
        $resultado = mysqli_query($conexao, $sql);


        if($resultado){
          $mensagem = 'Registro atualizado com sucesso.';
        }else {
            $error = 'Erro ao executar a alteração: '. mysqli_error($conexao);
        }
    }
    
    //Se tem o parâmetro id na URL
if (isset($_GET['id_ban']) && !empty($_GET['id_ban'])) {
    $id_ban = $_GET['id_ban']; //Copio o valor para var $id_ban
} else { //Se não estiver
    header('Location: banner.php'); //redireciona o usuário de volta para o banner
    exit;
}

$sql2 = "SELECT * FROM banner_tb WHERE id_ban =$id_ban";

$resultado2 = mysqli_query($conexao, $sql2);

if ($resultado2) {
    $banner = mysqli_fetch_assoc($resultado2);
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
                <h2 class="text-center mt-4">Atualizar Imagens - Banner</h2>

                <p><em>Obs.: Ao executar alterações no banner, usar imagens com a mesma resolução nos três campos e acima de 1200 pixels.</em></p>

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
                    <input type="hidden" name="oldImg1" value="<?=$banner['imgi_ban']?>">
                    <input type="hidden" name="oldImg2" value="<?=$banner['imgii_ban']?>">
                    <input type="hidden" name="oldImg3" value="<?=$banner['imgiii_ban']?>">
                    <input type="hidden" name="id_ban" value="<?= $id_ban?>">

                    <!-- Título intro Serviço -->
                    <div class="form-group">
                        <label for="imagemI">Imagem 1:</label>
                        <input  class="form-control" type="file" name="imgi_ban" id="imagemI">
                    </div>
                    <!-- Resumo intro Serviço -->
                    <div class="form-group">
                        <label for="imagemII">Imagem 2:</label>
                        <input class="form-control" type="file" name="imgii_ban" id="imagemII">
                    </div>
                    <!-- Imagem intro Serviço -->
                    <div class="form-group">
                        <label for="imagemIII">Imagem 3:</label>
                        <input class="form-control" type="file" name="imgiii_ban" id="imagemIII">
                    </div>

                     <!-- Botões -->
                     <div class="form-row">
                        <div class="form-group-group col-6">
                            <button class="btn btn-block btn-success"><i class="far fa-save mr-2"></i>Salvar</button>        
                        </div>
                        <div class="form-group-group col-6">
                            <a href="banner.php" class="btn btn-block btn-secondary"><i class="fas fa-times mr-2"></i>Cancelar</a>        
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