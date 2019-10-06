<?php

    require_once '../conecta/conexao.php';
    require_once 'autentica.php';

    if(isset($_POST['op'])){

        $id_sob           = $_POST['id_sob'];
        $titulo_sob       = $_POST['titulo_sob'];
        $texto_ini_sob    = $_POST['texto_ini_sob'];
        $text_fim_sob    = $_POST['text_fim_sob'];
        //$img_sob          = $_POST['img_sob'];

         // Se estiver definido o campo imagem
    if(isset($_FILES['img_sob']) && $_FILES['img_sob']['error'] ==0){

        $img_sob = $_FILES['img_sob']['name'];

        //  Aqui obtenho a extensao do arquivo original
        $ext = explode('.', $img_sob)[1];

        //  cria um nome criptografado, se estiver com o nome repetido
        $novo_nome = md5(time());

        // Ajusto o nome correto da img_sob antes de salvar np banco
        $img_sob = "$novo_nome.$ext";

        //  Move o arquivo para a pasta desejada
        move_uploaded_file($_FILES['img_sob']['tmp_name'], "../upload/$img_sob");
    }else{
        $img_sob = $_POST['oldImg'];
    }

        $titulo_sob = mysqli_real_escape_string($conexao, $titulo_sob);
        $texto_ini_sob = mysqli_real_escape_string($conexao, $texto_ini_sob);
        $text_fim_sob    = mysqli_real_escape_string($conexao, $text_fim_sob);
        //$img_sob     = mysqli_real_escape_string($conexao, $img_sob);


        $sql = "UPDATE sobre_tb SET titulo_sob='$titulo_sob', texto_ini_sob='$texto_ini_sob',text_fim_sob='$text_fim_sob', img_sob='$img_sob', data_update_sob=now() where id_sob=$id_sob";
        //var_dump($sql);
        $resultado = mysqli_query($conexao, $sql);
        //var_dump($resultado);

        if($resultado){
          $mensagem = 'Registro atualizado com sucesso.';
        }else {
            $error = 'Erro ao executar a alteração: '. mysqli_error($conexao);
        }
    }
    
    //Se tem o parâmetro id na URL
if (isset($_GET['id_sob']) && !empty($_GET['id_sob'])) {
    $id_sob = $_GET['id_sob']; //Copio o valor para var $id_sob
} else { //Se não estiver
    header('Location: sobre.php'); //redireciona o usuário de volta para o sobre
    exit;
}

$sql2 = "SELECT * FROM sobre_tb WHERE id_sob =$id_sob";

$resultado2 = mysqli_query($conexao, $sql2);

if ($resultado2) {
    $sobre = mysqli_fetch_assoc($resultado2);
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
                <h2 class="text-center mt-4">Atualizar Sobre</h2>

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
                    <input type="hidden" name="oldImg" value="<?=$sobre['img_sob']?>"> 
                    <input type="hidden" name="id_sob" value="<?= $id_sob?>">



                    <!-- Título intro Serviço -->
                    <div class="form-group">
                        <label for="tituloPagina">Título da Página:</label>
                        <input value="<?= htmlspecialchars($sobre['titulo_sob']) ?>" class="form-control" type="text" name="titulo_sob" id="tituloPagina">
                    </div>
                    <!-- Resumo intro Serviço -->
                    <div class="form-group">
                        <label for="textoiniSobre">Texto inicial:</label>
                        <textarea class="form-control" rows="5" name="texto_ini_sob" id="textoiniSobre"><?= htmlspecialchars($sobre['texto_ini_sob']) ?></textarea>
                    </div>
                    <!-- Imagem intro Serviço -->
                    <div class="form-group">
                        <label for="textofimSobre">Texto Final:</label>
                        <textarea class="form-control" rows="5" id="textofimSobre" name="text_fim_sob"><?= htmlspecialchars($sobre['text_fim_sob']) ?></textarea>
                    </div>
                    <!-- Imagem conteúdo Serviço -->
                    <div class="form-group">
                        <label for="imagemSobre">Imagem:</label>
                        <input class="form-control" type="file" id="imagemSobre" name="img_sob">
                    </div>
                    <!-- Texto Conteúdo Serviço -->
                   
                    <!-- Botões -->
                    <div class="form-row">
                        <div class="form-group-group col-6">
                            <button class="btn btn-block btn-success"><i class="far fa-save mr-2"></i>Salvar</button>        
                        </div>
                        <div class="form-group-group col-6">
                            <a href="sobre.php" class="btn btn-block btn-secondary"><i class="fas fa-times mr-2"></i>Cancelar</a>        
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