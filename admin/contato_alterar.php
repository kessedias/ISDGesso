<?php
// código do kesse
    require_once '../conecta/conexao.php';
    require_once 'autentica.php';

    if(isset($_POST['op'])){

        $id_cont           = $_POST['id_cont'];
        $nome_emp_cont = $_POST['nome_emp_cont'];
        $cnpj_cont = $_POST['cnpj_cont'];
        $email_cont    = $_POST['email_cont'];
        $tel_cont     = $_POST['tel_cont'];
        $resp_cont   = $_POST['resp_cont'];

        $nome_emp_cont = mysqli_real_escape_string($conexao, $nome_emp_cont);
        $cnpj_cont = mysqli_real_escape_string($conexao, $cnpj_cont);
        $email_cont    = mysqli_real_escape_string($conexao, $email_cont);
        $tel_cont     = mysqli_real_escape_string($conexao, $tel_cont);
        $resp_cont   = mysqli_real_escape_string($conexao, $resp_cont);

        $sql = "UPDATE contato SET nome_emp_cont='$nome_emp_cont', cnpj_cont='$cnpj_cont', email_cont='$email_cont', tel_cont='$tel_cont', resp_cont='$resp_cont', data_update_cont=NOW() where id_cont=$id_cont";
        //var_dump($sql);
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
if (isset($_GET['id_cont']) && !empty($_GET['id_cont']) && !($_GET['id_cont'] > 1)) {
    $id_cont = $_GET['id_cont']; //Copio o valor para var $id_cont
} else { //Se não estiver
    header('Location: contato.php'); //redireciona o usuário de volta para o contato
    exit;
}

$sql2 = "SELECT * FROM contato WHERE id_cont =$id_cont";

$resultado2 = mysqli_query($conexao, $sql2);

if ($resultado2) {
    $contato = mysqli_fetch_assoc($resultado2);
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

                <form method="post">
                    <input type="hidden" name="op" value="update">
                    <input type="hidden" name="id_cont" value="<?= $id_cont?>">



                    <!-- Título intro Serviço -->
                    <div class="form-group">
                        <label for="nomeEmpresa">Nome da Empresa:</label>
                        <input value="<?= htmlspecialchars($contato['nome_emp_cont']) ?>" class="form-control" type="text" name="nome_emp_cont" id="nomeEmpresa">
                    </div>
                    <!-- Resumo intro Serviço -->
                    <div class="form-group">
                        <label for="cnpjContato">CNPJ:</label>
                        <input value="<?= htmlspecialchars($contato['cnpj_cont']) ?>" class="form-control" type="text" name="cnpj_cont" id="cnpjContato">
                    </div>
                    <!-- Imagem intro Serviço -->
                    <div class="form-group">
                        <label for="emailContato">E-mail:</label>
                        <input value="<?= htmlspecialchars($contato['email_cont']) ?>" class="form-control" type="email" id="emailContato" name="email_cont">
                    </div>
                    <!-- Imagem conteúdo Serviço -->
                    <div class="form-group">
                        <label for="telContato">Telefone:</label>
                        <input value="<?= htmlspecialchars($contato['tel_cont']) ?>" class="form-control" type="text" id="telContato" name="tel_cont">
                    </div>
                    <!-- Texto Conteúdo Serviço -->
                    <div class="form-group">
                        <label for="respContato">Responsáveis:</label>
                        <input value="<?= htmlspecialchars($contato['resp_cont']) ?>" class="form-control" type="text" name="resp_cont" id="respContato">
                    </div>
                    <!-- Botões -->
                    <div class="form-row">
                        <div class="form-group-group col-6">
                            <button class="btn btn-block btn-success"><i class="far fa-save mr-2"></i>Salvar</button>        
                        </div>
                        <div class="form-group-group col-6">
                            <a href="contato.php" class="btn btn-block btn-secondary"><i class="fas fa-times mr-2"></i>Cancelar</a>        
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