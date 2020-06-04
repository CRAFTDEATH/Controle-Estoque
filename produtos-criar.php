<?php ob_start() ?>
<?php session_start() ?>
<?php require_once 'cabecalho.php'; ?>
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
<?php $categoria = new Categoria(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Criar Nova Produto</h2>
        </div>
    </div>
    <form action="produtos-inserir-post.php" method="post">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" class="form-control" name="produto" placeholder="Nome do Produto" required>
                </div>
                <div class="form-group">
                    <label for="preco">Preço da Produto</label>
                    <input type="number" step="0.01" min="0" name="preco" class="form-control" placeholder="Preço do Produto" required>
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade do Produto</label>
                    <input type="number"  min="0" name="quantidade" class="form-control" placeholder="Quantidade do Produto" required>
                </div>
                <div class="form-group">
                    <label for="nome">Categoria do Produto</label>
                    <select class="form-control" name="categoria">
                    <?php $list = $categoria->listar(); ?>
                    <?php foreach($list AS $itens) :  ?>
                        <option value="<?= $itens['id'] ?>"><?= $itens['nome']?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-success btn-block" value="Salvar">
            </div>
        </div>
    </form>
</div>
<?php require_once 'rodape.php' ?>
