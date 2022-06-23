<?php

//$path = $_SERVER['DOCUMENT_ROOT'] . '/distribuidoradebebidas/model//';
//$file = $path . 'bebida.php';
//require_once $file;
//require_once '../model/bebida.php';

require_once 'conexao.php';

class BebidaDAO
{
    private $con;

    public function BebidaDAO()
    {
        $c         = new Conexao();
        $this->con = $c->getConexao();
    }

    public function incluirBebida(Bebida $bebida)
    {
        try {
            $sql = $this->con->prepare("insert into bebidas(nome,descricao,volume,preco,peso,qde_estoque,fabricante,dataFabricacao,id_categoria) values (:nome,:descricao,:volume,:preco,:peso,:quantidade,:fabricante,:data,:categoria)");
			
            $sql->bindValue(':nome', $bebida->getNome());
            $sql->bindValue(':descricao', $bebida->getDescricao());
            $sql->bindValue(':volume', $bebida->getVolume());
            $sql->bindValue(':preco', $bebida->getPreco());
            $sql->bindValue(':peso', $bebida->getPeso());
            $sql->bindValue(':quantidade', $bebida->getQde_estoque());
            $sql->bindValue(':fabricante', $bebida->getFabricante());
            $sql->bindValue(':data', $bebida->getDataFabricacao());
            $sql->bindValue(':categoria', $bebida->getId_Categoria());

            $sql->execute();
        } catch (Exception $ex) {
            $ex->getMessage();
        }

    }

    public function getBebidas()
    {
        $rs = $this->con->query("SELECT * FROM bebidas"); 

        $lista = array();

        while ($bebida = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $bebida;
        }
        return $lista;
    }

    public function getBebidasPorCategoria($id_categoria)
    {
        $sql = $this->con->prepare("SELECT * FROM bebidas WHERE id_categoria LIKE :id_categoria");
        $sql->bindValue(':id_categoria', $id_categoria . '%');
        $rs = $sql->execute();

        $lista = array();

        while ($bebida = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $bebida;
        }
        return $lista;
    }

    public function getBebidasPorFabricante($fabricante)
    {
        $sql = $this->con->prepare("SELECT * FROM bebidas WHERE fabricante LIKE :fabricante");
        $sql->bindValue(':fabricante', $fabricante . '%');
        $rs = $sql->execute();

        $lista = array();

        while ($bebida = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $bebida;
        }
        return $lista;
    }

    public function getBebidasPorId($id_bebida)
    {
        $sql = $this->con->prepare("SELECT * FROM bebidas WHERE id_bebida LIKE :id_bebida");
        $sql->bindValue(':id_bebida', $id_bebida . '%');
        $rs = $sql->execute();

        $lista = array();

        while ($bebida = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $bebida;
        }
        return $lista;
    }

    public function excluirBebida($id_bebida)
    {
        $sql = $this->con->prepare("DELETE FROM bebidas WHERE id_bebida = :id_bebida");

        $sql->bindValue(':id_bebida', $id_bebida);
        $sql->execute();
    }

    public function atualizarBebida(Bebida $bebida, $id_bebida)
    {
		
        $sql = $this->con->prepare("update bebidas set nome = :nome, descricao = :descricao, volume = :volume, preco = :preco, peso = :peso, qde_estoque = :quantidade, fabricante = :fabricante, dataFabricacao = :data, id_categoria = :categoria where id_bebida = :id_bebida");

			$sql->bindValue(':nome', $bebida->getNome());
			$sql->bindValue(':descricao', $bebida->getDescricao());
            $sql->bindValue(':volume', $bebida->getVolume());
            $sql->bindValue(':preco', $bebida->getPreco());
            $sql->bindValue(':peso', $bebida->getPeso());
            $sql->bindValue(':quantidade', $bebida->getQde_estoque());
            $sql->bindValue(':fabricante', $bebida->getFabricante());
            $sql->bindValue(':data', $bebida->getDataFabricacao());
            $sql->bindValue(':categoria', $bebida->getId_Categoria());
			$sql->bindValue(':id_bebida', $id_bebida);

        $sql->execute();

    }

    public function getBebida($id_bebida)
    {
        $sql = $this->con->prepare('SELECT * FROM bebidas WHERE id_bebida= :id_bebida');

        $sql->bindValue(':id_bebida', $id_bebida);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }
	
	 public function atualizarEstoque($quantidade, $id_bebida)
    {
		
        $sql = $this->con->prepare("update bebidas set qde_estoque = :quantidade where id_bebida = :id_bebida");

            $sql->bindValue(':quantidade', $quantidade);
			$sql->bindValue(':id_bebida', $id_bebida);

        $sql->execute();

    }
}