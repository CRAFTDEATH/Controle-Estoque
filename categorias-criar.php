<?php ob_start() ?>
<?php session_start() ?>
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
<?php require_once 'cabecalho.php' ?>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <h2>Criar Nova Categoria</h2>
    </div>
</div>

<form action="categorias-inserir-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome da Categoria</label>
                <input name="nome" type="text" class="form-control" placeholder="Nome da Categoria">
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>
</div>
<?php require_once 'rodape.php' ?>
