<?php

require_once '../model/bebida.php';
require_once '../model/item.php';
require_once '../model/compras.php';
require_once '../model/itensCompra.php';
require_once '../dao/comprasDAO.php';
require_once '../dao/itensCompraDAO.php';
require_once '../dao/bebidaDAO.php';

$opcao = (int) $_REQUEST['opcao'];

if ($opcao == 1) {
    session_start();

    if (isset($_SESSION["Cliente"])) {
        $cliente = $_SESSION["Cliente"];
        header("Location:../pagamento.php");
    } else {
        header("Location:../login.php?status=2");
    }
}

if ($opcao == 2) {
    session_start();
	
    $carrinho   = $_SESSION["Carrinho"];
    $cliente    = $_SESSION["Cliente"];
    $valorTotal = $_SESSION["ValorTotal"];
    $Valorfrete = $_SESSION["ValorTotalFrete"];
	
	//inserindo na tabela Compras
	$comprasDAO = new ComprasDAO();
	$data = date('Y,m,d');
	$compras = new Compras($cliente->id_cliente,$data,$valorTotal,$Valorfrete);
	$comprasDAO->incluirCompras($compras);
	
	//consultando o ultimo id auto incremental
	$id = $comprasDAO->lastId();	
		
	$bebidaDAO = new BebidaDAO();
	$itensCompraDAO = new ItensCompraDAO();
	
	foreach ($carrinho as $item) {
			
	$qtd = $item->getQuantidade();
    $bebida = $bebidaDAO->getBebida($item->getBebida());
	
	//inserindo itens comprados
	$itensCompra = new ItensCompra($bebida->id_bebida,$qtd,($bebida->preco*$qtd),$id);
	$itensCompraDAO->incluirItensCompra($itensCompra);
	
	//atualizando estoque
	$bebidaDAO->atualizarEstoque(($bebida->qde_estoque - $qtd),$bebida->id_bebida);
	
    }
    unset($_SESSION["Carrinho"]);

    header("Location:../compraFinalizada.php");
}
?>