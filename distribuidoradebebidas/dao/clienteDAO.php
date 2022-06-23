<?php
require_once '../model/cliente.php';
require_once 'conexao.php';

class ClienteDAO
{

    private $con;

    public function ClienteDAO()
    {
        $c         = new Conexao();
        $this->con = $c->getConexao();
    }

    public function incluirCliente(Cliente $cliente)
    {
        try {
            $sql = $this->con->prepare("insert into clientes(nome,cnpj,telefone,endereco,email,senha,admin,id_cidade) values (:nome,:cnpj,:telefone,:endereco,:email,:senha,0, :id_cidade)");
            $sql->bindValue(':nome', $cliente->getNome());
            $sql->bindValue(':cnpj', $cliente->getCnpj());
            $sql->bindValue(':telefone', $cliente->getTelefone());
            $sql->bindValue(':endereco', $cliente->getEndereco());
            $sql->bindValue(':email', $cliente->getEmail());
            $sql->bindValue(':senha', $cliente->getSenha());
            $sql->bindValue(':id_cidade', $cliente->getId_Cidade());
            $sql->execute();
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }


    public function getClientes()
    {
        $rs = $this->con->query("SELECT * FROM clientes");

        $lista = array();

        while ($cliente = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $cliente;
        }
        return $lista;
    }

    public function excluirCliente($cnpj)
    {
        $sql = $this->con->prepare("DELETE FROM clientes WHERE cnpj = :cnpj");

        $sql->bindValue(':cnpj', $cnpj);
        $sql->execute();
    }

    public function atualizarCliente(Cliente $cliente, $id_cliente)
    {
        $sql = $this->con->prepare("UPDATE clientes SET nome = :nome, cnpj = :cnpj, telefone = :telefone, endereco = :endereco, email = :email, senha = :senha, id_cidade = :id_cidade WHERE id_cliente = :id_cliente");
			
			$sql->bindValue(':nome', $cliente->getNome());
            $sql->bindValue(':cnpj', $cliente->getCnpj());
            $sql->bindValue(':telefone', $cliente->getTelefone());
            $sql->bindValue(':endereco', $cliente->getEndereco());
            $sql->bindValue(':email', $cliente->getEmail());
            $sql->bindValue(':senha', $cliente->getSenha());
            $sql->bindValue(':id_cidade', $cliente->getId_cidade());
            $sql->bindValue(':id_cliente', $id_cliente);


        $sql->execute();

    }

    public function getCliente($cnpj)
    {
        $sql = $this->con->prepare('SELECT * FROM clientes WHERE cnpj= :cnpj');

        $sql->bindValue(':cnpj', $cnpj);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function getClientePorEmail($email)
    {
        $sql = $this->con->prepare('SELECT * FROM clientes WHERE email= :email');

        $sql->bindValue(':email', $email);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }

// Autentica no banco de dados o cliente Pronto!!!

    public function autentica($email, $senha)
    {
        $sql = $this->con->prepare("SELECT * FROM clientes WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        if ($sql->rowCount() > 0) { // verifica se a consulta retorna algo
            return $sql->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
}
