<?php
require_once 'conexao.php';

  class CidadeDAO
  {
    private $con;

    public function CidadeDAO()
    {
        $c         = new Conexao();
        $this->con = $c->getConexao();
    }

    public function incluirCidade($descricao, $uf, $cep, $valor)
    {
      $sql = $this->con->prepare("insert into cidades (cidade, estado, cep, valorfrete_porPeso) values (:descricao, :uf, :cep, :valor)");
      $sql->bindValue(':descricao', $descricao);
      $sql->bindValue(':uf', $uf);
      $sql->bindValue(':cep', $cep);
      $sql->bindValue(':valor', $valor);
      $sql->execute();
    }

    public function excluirCidade($id)
    {
      $sql = $this->con->prepare("delete from cidades where id_cidade = :id");
      $sql->bindValue(':id', $id);
      $sql->execute();
    }

    public function atualizarCidade($id, $novaDescricao, $novoUf, $novoCep, $novoValor)
    {
      $sql = $this->con->prepare("update cidades set cidade = :descricao, estado = :uf, CEP = :cep, valorfrete_porPeso = :valor where id_cidade = :id");
      $sql->bindValue(':descricao', $novaDescricao);
      $sql->bindValue(':id', $id);
      $sql->bindValue(':uf', $novoUf);
      $sql->bindValue(':cep', $novoCep);
      $sql->bindValue(':valor', $novoValor);

      $sql->execute();
    }

    public function getCidade($id)
    {
      $sql = $this->con->prepare("select * from cidades where id_cidade = :id");
      $sql->bindValue(':id', (int) $id);
      $sql->execute();
      return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function getDescricao($id)
    {
      $sql = $this->con->prepare('SELECT * FROM cidades WHERE id_cidade= :id');
      $sql->bindValue(':id', (int)$id);
      $sql->execute();
      return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function getCidades()
    {
      $rs = $this->con->query("SELECT * FROM cidades");

      $lista = array();

      while ($cidade = $rs->fetch(PDO::FETCH_OBJ)) {
          $lista[] = $cidade;
      }
      return $lista;
    }

  }

?>
