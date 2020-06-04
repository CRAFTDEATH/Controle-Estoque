<?php
ob_start();
session_start();
require_once("autoload.php");
if(isset($_GET) && !empty($_GET)){
    $produto = new Produto();
    $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
    $produto->id = $id;
    try {
    
        $produto->excluir();
        header("Location:produtos.php");
    }
    catch(Exception $e){
        Erro::trataErro($e);
    }
    

} else{
    header("Location:produtos-criar.php");
}