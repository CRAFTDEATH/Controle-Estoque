<?php ob_start() ?>
<?php session_start() ?>
<?php require_once("autoload.php"); ?>
<?php 
    $user = new Usuario();
    $estaLogado = $user->estaLogado();

    if($estaLogado == true){
        $_SESSION['success'] ="Voce Ja esta logado";
        header("Location:index.php");
        exit;
    } 
    
?>
<?php require_once 'funcoes/mostra-alerta.php'?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Controle de Estoque</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/estilo.css" rel="stylesheet">
	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</head>
<?php require_once("modal.php"); ?>
<body id="banner">

	
	<div class="container">
		<div class="row">
  			<p><br/></p>
  			<p><br/></p>
  			<p><br/></p>
  			<div class="col-md-4">
  				
  			</div>

  			<div class="col-md-4">
  			
  				<div class="panel panel-default">
  					
  					<div class="panel-body">
    					
    					<div class="page-header">
  							<h1>Login </h1>
						</div>

						
					<div>
						<?php
						 mostraAlerta("danger"); 
						?>
					</div>	

						
						<form action="login-acessar-post.php" method="post">
  							
  							
  							<div class="form-group">
    							<label for="login">Usuário</label>
								<div class="input-group">
  									<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user" ></span></span>
	    							<input type="text" name="usuario" class="form-control" required  id="login" placeholder="Digite seu usuario" autofocus>
  							</div>
  							
  							<div class="form-group">
    							<label for="senha">Senha</label>
								<div class="input-group">
  									<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock" ></span></span>
    							<input type="password" name="senha" class="form-control" id="senha" placeholder="Digite sua senha" required>
								</div>
  							</div>
							
							<hr/>

							
							<div class="pull-right">  
  								<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Acessar</button>
  							</div>
  							
						</form>
					
				</div>
  			</div>

            <div class="col-md-4">
  				
            </div>
      
		</div>
	</div>
</body>
</html>
