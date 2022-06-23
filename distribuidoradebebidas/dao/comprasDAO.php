<?php

require_once 'conexao.php';

  class ComprasDAO
  {
    private $con;

    public function ComprasDAO()
    {
        $c         = new Conexao();
        $this->con = $c->getConexao();
    }

    public function incluirCompras(Compras $compras) 
    {
      $sql = $this->con->prepare("insert into compras (id_cliente, data_compra, valor_total, valortotal_frete) values (:id_cliente, :data_compra, :valor_total, :valortotal_frete)");
      $sql->bindValue(':id_cliente', $compras->getId_cliente());
      $sql->bindValue(':data_compra', $compras->getData_compra());
      $sql->bindValue(':valor_total', $compras->getValor_Total());
      $sql->bindValue(':valortotal_frete', $compras->getValortotal_frete());
	  
      $sql->execute();
    }
	
	public function getCompras()
    {
        $rs = $this->con->query("SELECT * FROM compras");

        $lista = array();

        while ($compra = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $compra;
        }
        return $lista;
    }
	
	public function getComprasPorId($id_compra)
    {
        $sql = $this->con->prepare("SELECT * FROM compras WHERE $id_compra LIKE :id_compra");
        $sql->bindValue(':id_compra', $id_compra);
        $rs = $sql->execute();

        $lista = array();

        while ($item = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $item;
        }
        return $lista;
    }


    public function excluirCompras($id_compra)
    {
      $sql = $this->con->prepare("delete from compras where id_compra = :id_compra");
	  
      $sql->bindValue(':id_compra', $id_compra);
      $sql->execute();
    }

    public function atualizarCompras(Compras $compras, $id_compra)
    {
      $sql = $this->con->prepare("update compras set id_cliente = :id_cliente, data_compra = :data_compra, valor_total = :valor_total, valortotal_frete = :valortotal_frete where id_compra = :id_compra");
	  
      $sql->bindValue(':id_cliente', $compras->getId_cliente());
      $sql->bindValue(':data_compra', $compras->getData_compra());
      $sql->bindValue(':valor_total', $compras->getValor_Total());
      $sql->bindValue(':valortotal_frete', $compras->getValortotal_frete());
      $sql->bindValue(':id_compra', $id_compra);
      
      $sql->execute();
    }
	
	 public function lastId()
    {
      $sql = $this->con->lastInsertId();
	 	  
	  return (int)$sql;
    }

  }

?>
