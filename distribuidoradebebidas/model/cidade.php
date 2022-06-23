<?php
class Cidade
{
    private $id_cidade;
    private $nome;
    private $valor_frete;

    public function Cidade($id_cidade, $nome, $valor_frete)
    {
        $this->id_cidade = $id_cidade;
        $this->nome = $nome;
        $this->valor_frete = $valor_frete;
    }

    public function getId_cidade()
    {
        return $this->id_cidade;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setValorFrete($valor_frete)
    {
        $this->valor_frete = $valor_frete;
    }

    public function getValorFrete()
    {
        return $this->valor_frete;
    }

}
