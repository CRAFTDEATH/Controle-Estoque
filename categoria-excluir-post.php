<?php require_once "autoload.php"; ?>
<?php ob_start() ?>
<?php session_start() ?>
<?php 
try {
    $id = $_GET['id'];

    $categoria = new Categoria();
    $categoria->id = $id;
    $categoria->excluir();
}
catch (Exception $e){
    $_SESSION['danger'] = "Essa Categoria esta em uso no momento para excluir essa categoria, exclua todos os produtos existentes dessa categoria"
     ." <a href='excluir-produtos-categoria.php?id=$id'><b>Excluir categoria e todos os produtos dessa categoria</b></a>";
}
header("Location:categorias.php");




?>