<?php
ob_start();
session_start();
?>
<?php require_once("autoload.php") ?>
<?php 
    $user = new Usuario();
    $estaLogado = $user->estaLogado();

    if($estaLogado == false){
        $_SESSION['danger'] ="Por favor faça o login";
        header("Location:login.php");
        exit;
    } 
    
?>
<?php require_once("cabecalho.php") ?>
<?php
    $produto = new Produto();
    try {
        
        $itens = $produto->listar();
    }
    catch(Exception $e){
        Erro::trataErro($e);
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Produtos</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <a href="produtos-criar.php" class="btn btn-info btn-block">Novo Produto</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Categoria</th>
                        <th class="acao">Editar</th>
                        <th class="acao">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($itens AS $value) : ?>
                        <tr>
                            <td><?=$value['id']?></td>
                            <td><?=$value['nome_produto']?></td>
                            <td><?=$value['preco']?></td>
                            <td><?=$value['quantidade']?></td>
                            <td><?=$value['nome_categoria']?></td>
                            <td><a href="produtos-editar.php?id=<?=$value['id']?>" class="btn btn-info">Editar</a></td>
                            <td><a href="produtos-excluir-post.php?id=<?=$value['id']?>" class="btn btn-danger">Excluir</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once 'rodape.php' ?>
