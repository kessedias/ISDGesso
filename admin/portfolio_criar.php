<?php
    require_once '../conecta/conexao.php';
    require_once 'autentica.php';

    if(isset($_POST['op'])){

        $titulo_emp_port = $_POST['titulo_emp_port'];
        $nome_serv_port = $_POST['nome_serv_port'];
        //$img_emp_port    = $_POST['img_emp_port'];
        //$img_serv_port     = $_POST['img_serv_port'];

        if(isset($_FILES['img_emp_port']) && $_FILES['img_emp_port']['error'] ==0) {

            $img_emp_port = $_FILES['img_emp_port']['name'];
    
    
            //  Aqui obtenho a extensao do arquivo original
            $ext = explode('.', $img_emp_port)[1];
    
    
            //  cria um nome criptografado, se estiver com o nome repetido
            $novo_nome = 'a'. md5(time());
    
            // Ajusto o nome correto da imagem antes de salvar np banco
            $img_emp_port = "$novo_nome.$ext";
        
    
            //  Move o arquivo para a pasta desejada
            move_uploaded_file($_FILES['img_emp_port']['tmp_name'], "../upload/$img_emp_port");
        }else{
            $img_emp_port = $_POST['oldImg1'];
            var_dump($img_emp_port);
        }
    
          //IMAGEM CONTEÚDO Serviços
            // Se estiver definido o campo imagem
            if(isset($_FILES['img_serv_port']) && $_FILES['img_serv_port']['error'] ==0) {
    
                $img_serv_port = $_FILES['img_serv_port']['name'];
        
        
                //  Aqui obtenho a extensao do arquivo original
                $ext = explode('.', $img_serv_port)[1];
        
        
                //  cria um nome criptografado, se estiver com o nome repetido
                $novo_nome = 'b'. md5(time());
        
                // Ajusto o nome correto da imagem antes de salvar np banco
                $img_serv_port = "$novo_nome.$ext";
            
        
                //  Move o arquivo para a pasta desejada
                move_uploaded_file($_FILES['img_serv_port']['tmp_name'], "../upload/$img_serv_port");
            }else{
                $img_serv_port = $_POST['oldImg2'];
            }

        $titulo_emp_port = mysqli_real_escape_string($conexao, $titulo_emp_port);
        $nome_serv_port = mysqli_real_escape_string($conexao, $nome_serv_port);
        //$img_emp_port    = mysqli_real_escape_string($conexao, $img_emp_port);
        //$img_serv_port     = mysqli_real_escape_string($conexao, $img_serv_port);


        $sql = "INSERT INTO portfolio_tb VALUES(0, '$titulo_emp_port', '$nome_serv_port', '$img_emp_port', '$img_serv_port', NOW())";
        
        $resultado = mysqli_query($conexao, $sql);

        if($resultado){
           header('Location: portfolio.php');
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
                        <label for="nomeEmpresa">Nome da Empresa</label>
                        <input class="form-control" type="text" name="titulo_emp_port" id="nomeEmpresa">
                    </div>
                    <!-- Resumo intro Serviço -->
                    <div class="form-group">
                        <label for="nomeServico">Nome do Serviço Prestado</label>
                        <input class="form-control" type="text" name="nome_serv_port" id="nomeServico">
                    </div>
                    <!-- Imagem intro Serviço -->
                    <div class="form-group">
                        <label for="imagemEmpresa">Logo da Empresa</label>
                        <input type="file" id="imagemEmpresa" name="img_emp_port">
                    </div>
                    <!-- Imagem conteúdo Serviço -->
                    <div class="form-group">
                        <label for="imagemServico">Imagem do Serviço Prestado</label>
                        <input type="file" id="imagemServico" name="img_serv_port">
                    </div>
                    <!-- Texto Conteúdo Serviço -->
    
                    <!-- Botões -->
                    <div class="form-row">
                        <div class="form-group-group col-6">
                            <button class="btn btn-block btn-success"><i class="far fa-save mr-2"></i>Salvar</button>        
                        </div>
                        <div class="form-group-group col-6">
                            <a href="portfolio.php" class="btn btn-block btn-secondary"><i class="fas fa-times mr-2"></i>Cancelar</a>        
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