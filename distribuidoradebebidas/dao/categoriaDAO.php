<?php
require_once 'conexao.php';

  class CategoriaDAO
  {
    private $con;

    public function CategoriaDAO()
    {
        $c         = new Conexao();
        $this->con = $c->getConexao();
    }

    public function incluirCategoria($descricao)
    {
      $sql = $this->con->prepare("insert into categoria (descricao) values (:descricao)");
      $sql->bindValue(':descricao', $descricao);
      $sql->execute();
    }

    public function excluirCategoria($id)
    {
      $sql = $this->con->prepare("delete from categoria where id_categoria = :id");
      $sql->bindValue(':id', $id);
      $sql->execute();
    }

    public function atualizarCategoria($id, $novaDescricao)
    {
      $sql = $this->con->prepare("update categoria set descricao = :descricao where id_categoria = :id");
      $sql->bindValue(':descricao', $novaDescricao);
      $sql->bindValue(':id', $id);
      $sql->execute();
    }

    public function getCategoria($id)
    {
      $sql = $this->con->prepare("select * from categoria where id_categoria = :id");
      $sql->bindValue(':id', (int) $id);
      $sql->execute();
      return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function getDescricao($id)
    {
      $sql = $this->con->prepare('SELECT * FROM categoria WHERE id_categoria= :id');
      $sql->bindValue(':id', (int)$id);
      $sql->execute();
      return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function getCategorias()
    {
      $rs = $this->con->query("SELECT * FROM categoria");

      $lista = array();

      while ($categoria = $rs->fetch(PDO::FETCH_OBJ)) {
          $lista[] = $categoria;
      }
      return $lista;
    }

  }

?>
