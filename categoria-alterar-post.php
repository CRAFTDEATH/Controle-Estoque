<?php require_once "autoload.php"; ?>

<?php
try {
    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $categoria = new Categoria();
    $categoria->id = $id;
    $categoria->nome = $nome;
    $categoria->alterar();
} catch (Exception $e) {
    Erro::trataErro($e);
}

header("Location:categorias.php");
