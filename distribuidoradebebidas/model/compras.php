<?php

class Compras
{
    private $id_compra;
    private $id_cliente;
    private $data_compra;
    private $valor_total;
    private $valortotal_frete;

    public function Compras($id_cliente, $data_compra, $valor_total, $valortotal_frete)
    {
        $this->id_cliente  = $id_cliente;
        $this->data_compra = $data_compra;
        $this->valor_total = $valor_total;
        $this->valortotal_frete = $valortotal_frete;
    }

    public function getId_compra()
    {
        return $this->id_compra;
    }

    public function setId_compra($id_compra)
    {
        $this->id_compra = $id_compra;

    }	

	public function getId_cliente()
    {
        return $this->id_cliente;
    }
	
	 public function setId_cliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }

	
    public function getData_compra()
    {
        return $this->data_compra;
    }

    public function setData_compra($data_compra)
    {
        $this->data_compra = $data_compra;

    }

    public function getValor_total()
    {
        return $this->valor_total;
    }

    public function setValor_total($valor_total)
    {
        $this->valor_total = $valor_total;
    }
	
	public function getValortotal_frete()
    {
        return $this->valortotal_frete;
    }

    public function setValortotal_frete($valortotal_frete)
    {
        $this->valortotal_frete = $valortotal_frete;
    }
}
