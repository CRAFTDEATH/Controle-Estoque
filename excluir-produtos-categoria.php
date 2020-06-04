<?php 
require_once("autoload.php");

$id = $_GET['id'];
$produto = new Produto();
$categoria = new Categoria();
$produto->id = $id;
$produto->excluirProdutoId();
$categoria->id = $id;
$categoria->excluir();

header("Location:categorias.php");


