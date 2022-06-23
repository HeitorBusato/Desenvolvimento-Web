<?php
class Bebida
{
    private $id_bebida;
    private $nome;
    private $descricao;
    private $volume;
    private $preco;
    private $peso;
    private $qde_estoque;
    private $fabricante;
    private $dataFabricacao;
	private $id_categoria;

    public function Bebida($nome, $descricao, $volume, $preco, $peso, $qde_estoque, $fabricante, $dataFabricacao, $id_categoria)
    {
        
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->volume = $volume;
        $this->preco = $preco;
        $this->peso = $peso;
        $this->qde_estoque = $qde_estoque;
        $this->fabricante = $fabricante;
        $this->dataFabricacao = $dataFabricacao;
        $this->id_categoria = $id_categoria;
		
    }

    public function getId_bebida()
    {
        return $this->id_bebida;
    }
	
	 public function setId_bebida($id_bebida)
    {
        $this->bebida = $bebida;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
		
    }
	
	public function getVolume()
    {
        return $this->volume;
    }

    public function setVolume($volume)
    {
        $this->volume = $volume;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public function getPeso()
    {
        return $this->peso;
    }
	
	public function setPeso($peso)
    {
       $this->peso = $peso;
    }

	public function getQde_estoque()
    {
        return $this->qde_estoque;
    }
    public function setQde_estoque($qde_estoque)
    {
        $this->qde_estoque = $qde_estoque;
    }
	
	public function getFabricante()
    {
        return $this->fabricante;
    }
	
    public function setFabricante($fabricante)
    {
        $this->fabricante = $fabricante;
    }
	
	public function getDataFabricacao()
    {
        return $this->dataFabricacao;
    }

    public function setDataFabricacao($dataFabricacao)
    {
        $this->dataFabricacao = $dataFabricacao;
    }	
	
    public function getId_Categoria()
    {
        return $this->id_categoria;
    }

    public function setCategoria($id_categoria)
    {
        $this->id_categoriacategoria = $id_categoriacategoria;
    }

}
