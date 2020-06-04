<?php require_once "autoload.php"; ?>
<?php
    try {
        $nome = $_POST['nome'];

        $categoria = new Categoria();
        $categoria->nome = $nome;
        $categoria->inserir();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
header("Location:categorias.php");
