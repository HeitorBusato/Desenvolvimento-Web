<?php

class Cliente
{
    private $nome;
    private $cnpj;
    private $telefone;
    private $endereco;
    private $email;
    private $senha;
	private $id_cidade;

    public function Cliente($nome, $cnpj, $telefone, $endereco,  $email, $senha, $id_cidade)
    {
        $this->nome     = $nome;
        $this->cnpj     = $cnpj;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        $this->email    = $email;
        $this->senha    = $senha;
        $this->id_cidade = $id_cidade;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getId_cidade()
    {
        return $this->id_cidade;
    } 
	
	public function setId_cidade($id_cidade)
    {
        $this->id_cidade = $id_cidade;

    }
	
	public function getSenha()
    {
        return $this->senha;
    }    
	
	public function setSenha($senha)
    {
        $this->senha = $senha;

    }
}
