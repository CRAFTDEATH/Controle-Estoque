<?php
class Categoria
{

    private $id;
    private $nome;
    public $produtos;

    public function __get($atributo)
    {
        return $this->$atributo;
    }
    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function listar()
    {
        $query = "SELECT id, nome FROM categorias";
        $conexao = Conexao::getConnect();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public function carregar(){
        $query = "SELECT id, nome FROM categorias WHERE id =:id";
        $conexao = Conexao::getConnect();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id",$this->id);
        $stmt->execute();
        $list = $stmt->fetch();
        return $list;
        
        
    }
    public function carregarProdutos(){
        $this->produtos = Produto::listarPorCategoria($this->id);
        
    }
    public function inserir(){
        $query = "INSERT INTO categorias(nome)VALUES(:nome) ";
        $conexao = Conexao::getConnect();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome",$this->nome);
        $stmt->execute();

    }
    public function alterar(){
        $query = "UPDATE categorias SET nome = :nome WHERE id= :id";
        $conexao = Conexao::getConnect();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome",$this->nome);
        $stmt->bindValue(":id",$this->id);
        $stmt->execute();


        
    }
    public function excluir(){
        $query = "DELETE FROM categorias WHERE id =:id";
        $conexao = Conexao::getConnect();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id",$this->id);
        $stmt->execute();
        
    }
   

}
