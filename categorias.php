<?php ob_start() ?>
<?php session_start() ?>
<?php require_once 'cabecalho.php' ?>
<?php require_once("autoload.php"); ?>
<?php 
    $user = new Usuario();
    $estaLogado = $user->estaLogado();

    if($estaLogado == false){
        $_SESSION['danger'] ="Por favor faça o login";
        header("Location:login.php");
        exit;
    } 
    
?>
<?php require_once 'funcoes/mostra-alerta.php'?>
<div class="container">
    <?php mostraAlerta(); ?> 
    <div class="row">
        <div class="col-md-12">
            <h2>Categorias</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <a href="categorias-criar.php" class="btn btn-info btn-block">Nova Categoria</a>
        </div>
    </div>
    <?php 
        try {
             $categoria = new Categoria();
             $nomes = $categoria->listar();
        } catch (Exception $e) {
            Erro::trataErro($e);
        }
        
    ?>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th class="acao">Editar</th>
                        <th class="acao">Excluir</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($nomes AS $nome) : ?>
                        <tr>
                            <td><a href="categorias-detalhe.php?id=<?= $nome['id']?>" class="btn btn-link"><?= $nome['id'] ?></a>
                            </td>
                            <td><a href="categorias-detalhe.php?id=<?= $nome['id']?>" class="btn btn-link"><?= $nome['nome'] ?></a>
                            </td>
                            <td><a href="categorias-editar.php?id=<?= $nome['id']?>"
                                    class="btn btn-info">Editar</a></td>
                            <td><a href="categoria-excluir-post.php?id=<?= $nome['id'] ?>"
                                    class="btn btn-danger">Excluir</a></td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once 'rodape.php'?>