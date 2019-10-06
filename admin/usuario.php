<?php
//Incluir a conexao com o banco
require_once '../conecta/conexao.php';
require_once 'autentica.php';

$sql = "SELECT id_usuario, nome, sobrenome, email, tipo FROM usuarios_tb ";

//Instrucao SQL para trazer as usuarios

//Executando a query
$resultado = mysqli_query($conexao, $sql);

if ($resultado) { //Se eu tenho resultado
    //Converte o resultado para um array associativo
    $tabela = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}else{ //Se eu não tenho um resultado
    $tabela = [];
}

$limite = 5;
$total_usuarios = count($tabela);
$total_paginas = ceil($total_usuarios / $limite);

if (isset($_GET['pag'])) {//Se pag estiver definido na url
    $pag_atual = $_GET['pag']; //Copia o valor para a variável atual
}else{//Se não estiver
    $pag_atual = 1; //Inicializa a variável com valor 1
}

$offset = $limite * ($pag_atual - 1);
$sql = $sql . "  LIMIT $offset, $limite";

$resultado2 = mysqli_query($conexao, $sql);

if($resultado2){
    $tabela = mysqli_fetch_all($resultado2, MYSQLI_ASSOC);
}else{
    $tabela = [];
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
    <!-- Chamando o cabeçalho do site -->
    <?php require_once 'header.php' ?>

    <!-- Início Conteúdo -->
    <main class="container">
        <div class="row">
            <div class="col-12">

                <table class="table table-hover" style="background-color: whitesmoke;">
                    <h2 class="mt-4 text-center mt-1">Usuários</h2>

                     <?php include('mensagem.php'); ?>

                    <a href="usuario_criar.php" class="btn btn-success mb-2"><i class="fas fa-plus mr-1"></i>Novo Usuário</a>
                    <thead class="thead-dark">
                        <tr>
                            
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Sobrenome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php foreach($tabela as $linha): ?>
                        <tr>
                            
                            <th scope="row"><?= $linha['id_usuario']?></th>
                            <td><?= $linha['nome']?></td>
                            <td><?= $linha['sobrenome']?></td>
                            <td><?= $linha['email']?></td>
                            <td><?= $linha['tipo']?></td>
                            <td>
                                <a href="usuario_alterar.php?id_usuario=<?= $linha['id_usuario'];?>" class="btn btn-primary"><i class="fas fa-pencil-alt mr-1"></i>Editar</a>
                                <a href="usuario_excluir.php?id_usuario=<?= $linha['id_usuario'];?>" class="btn btn-danger"><i class="fas fa-trash mr-1"></i>Excluir</a>

                            
                            </td>
                        </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
    <nav aria-label="Navegação de página exemplo">
  <ul class="pagination justify-content-center">
        <?php if($pag_atual > 1): ?>
            <li class="page-item"><a class="page-link" href="usuario_index.php?pag=1" tabindex="-1">Primeira</a></li>
            <li class="page-item"><a class="page-link" href="usuario_index.php?pag=<?= $pag_atual - 1?>">Anterior</a></li>
            <?php endif; ?>

            <li class="page-item"><a class="page-link text-muted" style="background-color: whitesmoke;"><?=$pag_atual?>/<?= $total_paginas ?></a></li>
            
            <?php if($pag_atual < $total_paginas):?>
                <li class="page-item"><a class="page-link" href="usuario_index.php?pag=<?= $pag_atual + 1?>">Próxima</a></li>
                <li class="page-item"><a class="page-link" href="usuario_index.php?pag=<?= $total_paginas?>">Última</a></li>
            <?php endif; ?>
  </ul>
</nav>
    <!-- Final Conteúdo -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>

</html>