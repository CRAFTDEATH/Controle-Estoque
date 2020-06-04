<?php

class Produto
{
    private $id;
    private $nome;
    private $preco;
    private $quantidade;
    private $categoriaId;

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
        $query = "SELECT produtos.id,produtos.nome AS nome_produto,produtos.preco,produtos.quantidade,
        categorias.nome AS nome_categoria FROM produtos INNER JOIN categorias ON produtos.categoria_id = categorias.id";
        $conexao = Conexao::getConnect();
        $result = $conexao->query($query);
        $list = $result->fetchAll();
        return $list;
    }
    public static function listarPorCategoria($categoria_id){
        $query = "SELECT id, nome, preco, quantidade from produtos WHERE categoria_id =
        :categoria_id";
        $conexao = Conexao::getConnect();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':categoria_id', $categoria_id);
        $stmt->execute();
        return $stmt->fetchAll();
        }
    public function carregar()
    {
        $query = "SELECT nome, preco, quantidade, categoria_id FROM produtos WHERE id = :id";
        $connect = Conexao::getConnect();
        $stmt = $connect->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        $line = $stmt->fetch();
        return $line;
    }
    public function inserir()
    {
        $query = "INSERT INTO produtos(nome,preco,quantidade,categoria_id)
        VALUES(:nome,:preco,:quantidade,:categoria_id)";
        $connect = Conexao::getConnect();
        $stmt = $connect->prepare($query);
        $stmt->bindValue(":nome", $this->nome);
        $stmt->bindValue(":preco", $this->preco);
        $stmt->bindValue(":quantidade", $this->quantidade);
        $stmt->bindValue(":categoria_id", $this->categoriaId);
        $stmt->execute();
    }
    public function alterar()
    {
        $query = "UPDATE produtos 
        SET nome = :nome, preco = :preco, quantidade = :quantidade, categoria_id = :categoria_id WHERE id = :id ";
        
        $connect = Conexao::getConnect();
        $stmt = $connect->prepare($query);
        $stmt->bindValue(":nome", $this->nome);
        $stmt->bindValue(":preco", $this->preco);
        $stmt->bindValue(":quantidade", $this->quantidade);
        $stmt->bindValue(":categoria_id", $this->categoriaId);
        $stmt->bindValue(":id", $this->id);
        $stmt->execute();
    }

    public function excluir()
    {
        $query = "DELETE FROM produtos WHERE id = :id";
        $conexao = Conexao::getConnect();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }
    public function excluirProdutoId()
    {
        $query = "DELETE FROM produtos WHERE categoria_id = :id";
        $conexao = Conexao::getConnect();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }
}
