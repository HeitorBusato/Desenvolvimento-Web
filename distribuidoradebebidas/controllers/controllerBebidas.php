<?php


require_once '../model/bebida.php';
require_once '../dao/bebidaDAO.php';

$opcao = (int) $_REQUEST['opcao'];

if ($opcao == 1) { // Incluir bebida
		
	$bebida = new Bebida($_REQUEST['txtNomeBebida'], $_REQUEST['txtDescricaoBebida'], $_REQUEST['txtVolumeBebida'], $_REQUEST['txtPrecoBebida'], $_REQUEST['txtPesoBebida'], $_REQUEST['txtQde_estoqueBebida'], $_REQUEST['txtFabricanteBebida'], $_REQUEST['txtDataFabricacaoBebida'], $_REQUEST['txtCategoriaBebida']);
	
    $bebidaDAO = new BebidaDAO();

    $bebidaDAO->incluirBebida($bebida);

    header("Location: controllerBebidas.php?opcao=2");
}

if ($opcao == 2) { // Consultar todas bebidas
    $bebidaDAO = new BebidaDAO();
    session_start();
    $_SESSION['bebidas'] = $bebidaDAO->getBebidas();
    header("Location: ../exibirBebidas.php");
}

if ($opcao == 3) { // Pegar um bebida
    $bebidas      = $_REQUEST['id_bebida'];
    $bebidaDAO = new BebidaDAO();
    $bebida    = $bebidaDAO->getBebida($bebidas);
    session_start();
    $_SESSION['bebida'] = $bebida;
    header("Location: ../atualizarBebidas.php");
}

if ($opcao == 4) { // Remover bebida
    $bebida      = $_REQUEST['id_bebida'];
    $bebidaDAO = new BebidaDAO();
    $bebidaDAO->excluirBebida($bebida);
    header("Location: controllerBebidas.php?opcao=2");
}

if ($opcao == 5) { // Atualizar bebida
	session_start();
	$Id = $_SESSION['bebida'];
	$id = $Id->id_bebida;
	
    $bebida = new Bebida($_REQUEST['txtNomeBebida'], $_REQUEST['txtDescricaoBebida'], $_REQUEST['txtVolumeBebida'], $_REQUEST['txtPrecoBebida'], $_REQUEST['txtPesoBebida'], $_REQUEST['txtQde_estoqueBebida'], $_REQUEST['txtFabricanteBebida'], $_REQUEST['txtDataFabricacaoBebida'], $_REQUEST['txtCategoriaBebida']);
    
    $bebidaDAO = new BebidaDAO();
    $bebidaDAO->atualizarBebida($bebida,$id);
	
    header("Location: controllerBebidas.php?opcao=2");
}
if ($opcao == 6) { // Filtrar categoria
	
	$idcat = $_SESSION['txtCategoriaBebida'];	    
    $bebidaDAO = new BebidaDAO();
	session_start();
    $_SESSION['bebidas'] = $bebidaDAO->getBebidasPorCategoria($idcat);
	
    header("Location: ../bebidasCategoria.php");
}
