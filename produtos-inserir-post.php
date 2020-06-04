<?php 
require_once("autoload.php");

if(isset($_POST) && !empty($_POST)){
    $inserir = new Produto();
    $produto = filter_input(INPUT_POST,'produto',FILTER_SANITIZE_STRING);
    $preco = filter_input(INPUT_POST,'preco',FILTER_SANITIZE_NUMBER_FLOAT);
    $quantidade = filter_input(INPUT_POST,'quantidade',FILTER_SANITIZE_NUMBER_INT);
    $categoria = filter_input(INPUT_POST,'categoria',FILTER_SANITIZE_NUMBER_INT);
    $inserir->nome = $produto;
    $inserir->preco= $preco;
    $inserir->quantidade = $quantidade;
    $inserir->categoriaId = $categoria;
    try {
    
        $inserir->inserir();
        header("Location:produtos.php");
    }
    catch(Exception $e){
        Erro::trataErro($e);
    }

} else{
    header("Location:produtos-criar.php");
}

