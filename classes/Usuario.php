<?php 

class Usuario{
	private $id;
	private $nome;
	private $senha;
	private $perfil;

	public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
    public function __get($atributo){
        return $this->$atributo;
    }
	public function logar(){
		$conexao = Conexao::getConnect();
		$query = "SELECT nome,senha FROM usuario WHERE nome = :nome AND senha = :senha";
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':nome', $this->nome);
		$stmt->bindValue(':senha', $this->senha);
		$stmt->execute();
		$user = $stmt->fetch();
		$this->nome = $user['nome'];
		$count = $stmt->rowCount();

		if($count > 0){
			$_SESSION['usuario_logado'] = $this->nome;
			return true;
		}
		else{
			return false;
		}




		
		


	}
	public function estaLogado(){
		if(isset($_SESSION['usuario_logado']) && !empty($_SESSION['usuario_logado'])){
			return true;
			
		} else {
			
			return false;
		}
	}
	public function logout(){
		session_destroy();
		header("location:login.php");
	}
}



