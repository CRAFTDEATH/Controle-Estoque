<?php
session_start();
require_once("autoload.php");
if(isset($_POST) && !empty($_POST)){
    try {
        $autenticar = new Usuario();
        $usuario = filter_input(INPUT_POST, 'usuario');
        $senha = filter_input(INPUT_POST, 'senha');

        $autenticar->nome = $usuario;
        $autenticar->senha = $senha;
        $resposta = $autenticar->logar();
    
        if ($resposta == true) {
            $_SESSION['success'] = "Bem Vindo " . $usuario;
            header("Location:index.php");
        }
        if ($resposta == false) {
            $_SESSION['danger'] = "Usuario Incorreto";
            header("Location:login.php");
        }
    }
	catch (Exception $e){
		Erro::trataErro($e);
	}

}
else{
	$_SESSION['danger'] = "Insira um usuario e senha";
	header("Location:login.php");

}

?>