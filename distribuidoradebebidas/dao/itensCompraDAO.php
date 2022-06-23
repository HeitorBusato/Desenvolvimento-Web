<?php

require_once 'conexao.php';

  class itensCompraDAO
  {
    private $con;

    public function itensCompraDAO()
    {
        $c         = new Conexao();
        $this->con = $c->getConexao();
    }

    public function incluirItensCompra(ItensCompra $itensCompra) 
    {
      $sql = $this->con->prepare("insert into itens_compra (id_bebida, quantidade, valor_item, id_compra) values (:id_bebida, :quantidade, :valor_item, :id_compra)");
      $sql->bindValue(':id_bebida', $itensCompra->getId_bebida());
      $sql->bindValue(':quantidade', $itensCompra->getQuantidade());
      $sql->bindValue(':valor_item', $itensCompra->getValorItem());
      $sql->bindValue(':id_compra', $itensCompra->getId_compra());
	  
      $sql->execute();
    }
	
	public function getItensCompra()
    {
        $rs = $this->con->query("SELECT * FROM itens_compra");

        $lista = array();

        while ($itens = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $itens;
        }
        return $lista;
    }
	
	public function getItensCompraPorId($id_item)
    {
        $sql = $this->con->prepare("SELECT * FROM itens_compra WHERE $id_item LIKE :id_item");
        $sql->bindValue(':id_item', $id_item);
        $rs = $sql->execute();

        $lista = array();

        while ($item = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $item;
        }
        return $lista;
    }


    public function excluirItensCompra($id_item)
    {
      $sql = $this->con->prepare("delete from itens_compra where id_item = :id_item");
      $sql->bindValue(':id_item', $id_item);
      $sql->execute();
    }

    public function atualizarItensCompra(ItensCompra $itensCompra,  $id_item)
    {
      $sql = $this->con->prepare("update itens_compra set id_bebida = :id_bebida, quantidade = :quantidade, valor_item = :valor_item, id_compra = :id_compra where id_item = :id_item");
	  
      $sql->bindValue(':id_bebida', $itensCompra->getId_bebida());
      $sql->bindValue(':quantidade', $itensCompra->getQuantidade());
      $sql->bindValue(':valor_item', $itensCompra->getValorItem());
      $sql->bindValue(':id_compra', $itensCompra->getId_compra());
      $sql->bindValue(':id_item', $id_item);
      
      $sql->execute();
    }
	
  }

?>
