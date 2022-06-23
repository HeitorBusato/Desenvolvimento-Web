<?php
$path = '../model/bebida.php';

if (file_exists($path)) {
    require_once '../model/bebida.php';
    require_once '../dao/bebidaDAO.php';
    require_once '../model/item.php';

} else {
    require_once 'model/bebida.php';
    require_once 'dao/bebidaDAO.php';
    require_once 'model/item.php';
}

function calculaValor($preco, $quantidade)
{
    return $preco * $quantidade;
}

function calculaItem($id_bebida, $quantidade)
{
    $bebidaDAO    = new BebidaDAO();
    $bebida       = $bebidaDAO->getBebida($id_bebida);
    $preco        = $bebida->preco;

    $valorTotal = calculaValor($preco, $quantidade);

    return new Item($id_bebida, $quantidade, $valorTotal);
}

function VerificaItem($id_bebida)
{
	session_start();
	$carrinho = $_SESSION["Carrinho"];
	
    $bebidaDAO = new bebidaDAO();
	
	foreach ($carrinho as $itens){
    $bebida = $bebidaDAO->getBebida($itens->getBebida());
	$id = $bebida->id_bebida;
	if($id == $id_bebida){
		return true;
		}
    }
	return false;
}
