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
<?php 
$id = $_GET['id'];
?>
<?php $categoria = new Categoria(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Editar Categoria</h2>
        </div>
    </div>
    <form action="categoria-alterar-post.php" method="post">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <input type=hidden name="id"value="<?= $id ?>">
                    <label for="nome">Nome da Categoria</label>
                    <select name="nome" class="form-control">
                        <?php $list = $categoria->listar(); ?>
                        <?php foreach($list AS $itens) :  ?>
                            <option value=" <?= $itens['nome']?>" <?= $itens['id'] == $id ? 'selected' :''?>>
                                <?= $itens['nome']?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-success btn-block" value="Salvar">
            </div>
        </div>
    </form>
</div>
<?php require_once 'rodape.php' ?>
