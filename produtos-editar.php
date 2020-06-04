<?php ob_start() ?>
<?php session_start() ?>
<?php require_once("cabecalho.php") ?>
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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Editar Nova Categoria</h2>
        </div>
    </div>
    <?php 
        $produto = new Produto();
        $categoria = new Categoria();
        $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
        $produto->id = $id;
        try {
    
            $result = $produto->carregar();
           
        }
        catch(Exception $e){
            Erro::trataErro($e);
        }
        

    ?>

    <form action="produtos-alterar-post.php" method="post">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <input type="hidden" value="<?= $id ?>" name="id" class="form-control" placeholder="Nome do Produto"
                        required>
                </div>
                <div class="form-group">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" value="<?= $result['nome'] ?>" name="nome" class="form-control"
                        placeholder="Nome do Produto" required>
                </div>
                <div class="form-group">
                    <label for="preco">Preço da Produto</label>
                    <input type="number" value="<?= $result['preco'] ?>" name="preco" step="0.01" min="0"
                        class="form-control" placeholder="Preço do Produto" required>
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade do Produto</label>
                    <input type="number" value="<?= $result['quantidade'] ?>" name="quantidade" min="0"
                        class="form-control" placeholder="Quantidade do Produto" required>
                </div>
                <div class="form-group">
                    <label for="nome">Categoria do Produto</label>
                    <select class="form-control" name="categoria">
                        <?php $list = $categoria->listar() ?>
                        <?php foreach($list AS $itens) :  ?>
                            <option value="<?= $itens['id'] ?>" <?= $itens['id'] == $result['categoria_id'] ? 'selected' :''?>>
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