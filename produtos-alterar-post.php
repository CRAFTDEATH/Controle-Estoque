<?php 
require_once("autoload.php");

if(isset($_POST) && !empty($_POST)){
    $update = new Produto();
    $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
    $preco = filter_input(INPUT_POST,'preco');
    $quantidade = filter_input(INPUT_POST,'quantidade',FILTER_SANITIZE_NUMBER_INT);
    $categoria = filter_input(INPUT_POST,'categoria',FILTER_SANITIZE_NUMBER_INT);
    $update->id = $id;
    $update->nome = $nome;
    $update->preco= $preco;
    $update->quantidade = $quantidade;
    $update->categoriaId = $categoria;
    try {
    
        $update->alterar();
        header("Location:produtos.php");
    }
    catch(Exception $e){
        Erro::trataErro($e);
    }
}
else{
    header("Location:produtos.php");

}