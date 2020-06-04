<?php session_start(); ?>
<?php require_once 'cabecalho.php' ?>
<?php require_once 'funcoes/mostra-alerta.php'?>
<?php require_once "autoload.php"; ?>
<?php 
    $user = new Usuario();
    $estaLogado = $user->estaLogado();

    if($estaLogado == false){
        $_SESSION['danger'] ="Por favor faça o login";
        header("Location:login.php");
        exit;
    } 
    
    
?>
<div id="banner">
    <?php mostraAlerta("success");?>
</div>


<?php require_once 'rodape.php' ?>