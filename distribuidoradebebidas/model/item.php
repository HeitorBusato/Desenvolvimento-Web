<?php

class Item
{
    private $bebida;
    private $quantidade;
    private $valorTotal;

    public function Item($bebida, $quantidade, $valorTotal)
    {
        $this->bebida     = $bebida;
        $this->quantidade = $quantidade;
        $this->valorTotal   = $valorTotal;
    }

    public function getBebida()
    {
        return $this->bebida;
    }

    public function setBebida($bebida)
    {
        $this->bebida = $bebida;

    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    }

}
