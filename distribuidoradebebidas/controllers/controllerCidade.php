<?php
//require_once '../model/cidade.php';
require_once "../dao/cidadeDAO.php";
 
$opcao = (int) $_REQUEST['opcao'];
$cidadeDAO = new CidadeDAO();

if ($opcao == 1) {
  $cidadeDAO->incluirCidade($_REQUEST['txtDescricao'], $_REQUEST['txtUf'], $_REQUEST['txtCep'], $_REQUEST['txtValor']);
  header("Location: controllerCidade.php?opcao=2");
} else if ($opcao == 2) 
{
  $lista = $cidadeDAO->getCidades();
  session_start();
  $_SESSION['ListaCidades'] = $lista;
  header("Location: ../exibirCidades.php");
} else if ($opcao == 3) 
{
  $cidade = $cidadeDAO->getCidade((int) $_REQUEST['id']);
  session_start();
  $_SESSION['Cidade'] = $cidade;
  header("Location: ../atualizarCidade.php");
} else if ($opcao == 4) 
{
  $cidadeDAO->excluirCidade((int) $_REQUEST['id']);
  header("Location: controllerCidade.php?opcao=2");
} else if ($opcao == 5) 
{
  $cidadeDAO->atualizarCidade($_REQUEST['txtID'], $_REQUEST['txtDescricao'], $_REQUEST['txtUf'], $_REQUEST['txtCep'], $_REQUEST['txtValor']);
  header("Location: controllerCidade.php?opcao=2");
}


?>
