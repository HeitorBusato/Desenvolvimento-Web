<?php

class ItensCompra
{
    private $id_item;
    private $id_bebida;
    private $quantidade;
    private $valor_item;
    private $id_compra;

    public function ItensCompra($id_bebida, $quantidade, $valor_item, $id_compra)
    {
        $this->id_bebida  = $id_bebida;
        $this->quantidade = $quantidade;
        $this->valor_item = $valor_item;
        $this->id_compra = $id_compra;
    }

    public function getId_item()
    {
        return $this->id_item;
    }

    public function setId_item($id_item)
    {
        $this->id_item = $id_item;

    }	

	public function getId_bebida()
    {
        return $this->id_bebida;
    }
	
	 public function setId_bebida($id_bebida)
    {
        $this->bebida = $bebida;
    }

	
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($valor_item)
    {
        $this->valor_item = $valor_item;

    }

    public function getValorItem()
    {
        return $this->valor_item;
    }

    public function setValorItem($valor_item)
    {
        $this->valor_item = $valor_item;
    }
	
	public function getId_compra()
    {
        return $this->id_compra;
    }

    public function setId_compra($id_compra)
    {
        $this->id_compra = $id_compra;
    }
}
