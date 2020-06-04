<?php ob_start() ?>
<?php session_start() ?>
<?php require_once 'autoload.php'; ?>
<?php
    $user = new Usuario();
    $estaLogado = $user->estaLogado();

    if ($estaLogado == false) {
        $_SESSION['danger'] ="Por favor faça o login";
        header("Location:login.php");
        exit;
    }
?>
<?php
    try {
        $id = $_GET['id'];
        $categoria = new Categoria();
        $categoria->id = $id;
        $resultado = $categoria->carregar();
        $categoria->carregarProdutos();
        $listaProdutos = $categoria->produtos;
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
?>
<?php require_once 'cabecalho.php' ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Detalhe da Categoria</h2>
        </div>
    </div>
    <dl>
        <dt>ID</dt>
        <dd><?php echo $resultado['id'] ?></dd>
        <dt>Nome</dt>
        <dd><?php echo $resultado['nome'] ?></dd>
        <dt>Produtos</dt>
        <?php if (count($listaProdutos) > 0):?>
            <dd>
                <ul>
                    <?php foreach ($listaProdutos as $linhaProduto) : ?>
                        <li>
                            <a href="produtos-editar.php?id=<?php echo $linhaProduto['id']?>">
                            <?php echo $linhaProduto['nome'] ?></a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </dd>
            <?php else: ?>
                <dd>Não existem produtos para essa categoria</dd>
        <?php endif ?>
    </dl>
</div>
<?php require_once 'rodape.php'?>