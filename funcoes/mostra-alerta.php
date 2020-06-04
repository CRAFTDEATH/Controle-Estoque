<?php
function mostraAlerta() {
	if(isset($_SESSION['success'])) {
		echo"<div class='alert alert-success' role='alert'>".$_SESSION['success']."</div>";
		unset($_SESSION['success']);
	}
	
	
	else if(isset($_SESSION['danger'])){ 
	
		echo"<div class='alert alert-danger' role='alert'>".$_SESSION['danger']."</div>";
		unset($_SESSION['danger']);
	}
	else{

	}

	
	
}
?>