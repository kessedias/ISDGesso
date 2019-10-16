<?php
    require_once '../conecta/conexao.php';
    require_once 'autentica.php';

    if(isset($_POST['op'])){

        $titulo_intro_serv = $_POST['titulo_intro_serv'];
        $resumo_intro_serv = $_POST['resumo_intro_serv'];
        //$img_intro_serv    = $_POST['img_intro_serv'];
        //$img_cont_serv     = $_POST['img_cont_serv'];
        $texto_cont_serv   = $_POST['texto_cont_serv'];
        // código do kesse
         //IMAGEM Intro Serviços
        // Se estiver definido o campo imagem
    if(isset($_FILES['img_intro_serv']) && $_FILES['img_intro_serv']['error'] ==0) {

        $img_intro_serv = $_FILES['img_intro_serv']['name'];


        //  Aqui obtenho a extensao do arquivo original
        $ext = explode('.', $img_intro_serv)[1];


        //  cria um nome criptografado, se estiver com o nome repetido
        $novo_nome = 'a'. md5(time());

        // Ajusto o nome correto da imagem antes de salvar np banco
        $img_intro_serv = "$novo_nome.$ext";
    

        //  Move o arquivo para a pasta desejada
        move_uploaded_file($_FILES['img_intro_serv']['tmp_name'], "../upload/$img_intro_serv");
    }else{
        $img_intro_serv = $_POST['oldImg1'];
        var_dump($img_intro_serv);
    }

      //IMAGEM CONTEÚDO Serviços
        // Se estiver definido o campo imagem
        if(isset($_FILES['img_cont_serv']) && $_FILES['img_cont_serv']['error'] ==0) {

            $img_cont_serv = $_FILES['img_cont_serv']['name'];
    
    
            //  Aqui obtenho a extensao do arquivo original
            $ext = explode('.', $img_cont_serv)[1];
    
    
            //  cria um nome criptografado, se estiver com o nome repetido
            $novo_nome = 'b'. md5(time());
    
            // Ajusto o nome correto da imagem antes de salvar np banco
            $img_cont_serv = "$novo_nome.$ext";
        
    
            //  Move o arquivo para a pasta desejada
            move_uploaded_file($_FILES['img_cont_serv']['tmp_name'], "../upload/$img_cont_serv");
        }else{
            $img_cont_serv = $_POST['oldImg2'];
        }

        $titulo_intro_serv = mysqli_real_escape_string($conexao, $titulo_intro_serv);
        $resumo_intro_serv = mysqli_real_escape_string($conexao, $resumo_intro_serv);
        //$img_intro_serv    = mysqli_real_escape_string($conexao, $img_intro_serv);
        //$img_cont_serv     = mysqli_real_escape_string($conexao, $img_cont_serv);
        $texto_cont_serv   = mysqli_real_escape_string($conexao, $texto_cont_serv);

        $sql = "INSERT INTO servicos_tb VALUES(0, '$titulo_intro_serv', '$resumo_intro_serv', '$img_intro_serv', '$img_cont_serv', '$texto_cont_serv', NOW())";
        
        $resultado = mysqli_query($conexao, $sql);

        if($resultado){
           header('Location: index.php'); 
           $_SESSION['mensagem'] = 'Registro criado com sucesso.';  
        }else {
            $_SESSION['error'] = 'Erro ao executar a ação: '. mysqli_error($conexao);
        }

        //var_dump($resultado);

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
                <h2 class="text-center mt-4">Novo Serviço</h2>

                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="op" value="inserir">

                    <!-- Título intro Serviço -->
                    <div class="form-group">
                        <label for="tituloIntroServ">Título Página inicial - Serviços</label>
                        <input class="form-control" type="text" name="titulo_intro_serv" id="tituloIntroServ">
                    </div>
                    <!-- Resumo intro Serviço -->
                    <div class="form-group">
                        <label for="resumoIntroServ">Resumo Página inicial - Serviços</label>
                        <input class="form-control" type="text" name="resumo_intro_serv" id="resumoIntroServ">
                    </div>
                    <!-- Imagem intro Serviço -->
                    <div class="form-group">
                        <label for="imagemIntroServ">Imagem Página Inicial - Serviços</label>
                        <input type="file" id="imagemIntroServ" name="img_intro_serv">
                    </div>
                    <!-- Imagem conteúdo Serviço -->
                    <div class="form-group">
                        <label for="imagemContServ">Imagem Página Serviços</label>
                        <input type="file" id="imagemContServ" name="img_cont_serv">
                    </div>
                    <!-- Texto Conteúdo Serviço -->
                    <div class="form-group">
                        <label for="textContServ">Texto Página Serviços</label>
                        <textarea rows="5" class="form-control" type="textarea" name="texto_cont_serv" id="textContServ"></textarea>
                    </div>
                    <!-- Botões -->
                    <div class="form-row">
                        <div class="form-group-group col-6">
                            <button class="btn btn-block btn-success"><i class="far fa-save mr-2"></i>Salvar</button>        
                        </div>
                        <div class="form-group-group col-6">
                            <a href="index.php" class="btn btn-block btn-secondary"><i class="fas fa-times mr-2"></i>Cancelar</a>        
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