<?php

require_once '../model/cliente.php';
require_once '../dao/clienteDAO.php';


$opcao = (int) $_REQUEST['opcao'];

if ($opcao == 1) {
    $cnpj        = $_REQUEST['txtCNPJCliente'];
    $email      = $_REQUEST['txtEmailCliente'];
    $clienteDAO = new ClienteDAO();
    $isCNPJ      = ($clienteDAO->getCliente($cnpj));
    $isEmail    = ($clienteDAO->getClientePorEmail($email));

    if ($isCNPJ == null) {
            if ($isEmail == null) {
                $cliente = new Cliente($_REQUEST['txtNomeCliente'],$cnpj, $_REQUEST['txtTelefoneCliente'], $_REQUEST['txtEnderecoCliente'], $email, $_REQUEST['txtSenhaCliente'],$_REQUEST['txtCidade']);
               
               $clienteDAO->incluirCliente($cliente);
			   
                header("Location:controllerCliente.php?opcao=2");
            } else {
                header("Location:../formCliente.php?erro=4");
            }
    } else {
        header("Location:../formCliente.php?erro=2");
    }

}
// opção acertada pra bebidas :Pronta
if ($opcao == 2) {
    $clienteDAO = new ClienteDAO();
    $lista      = $clienteDAO->getClientes();
    session_start();
    $_SESSION['ListaClientes'] = $lista;
    header("Location: ../exibirClientes.php");
}
// opção acertada pra bebidas
if ($opcao == 3) {
    $cnpj       = (int) $_REQUEST['cnpj'];
    $clienteDAO = new ClienteDAO();
    $cliente    = $clienteDAO->getCliente($cnpj);
    session_start();
    $_SESSION['Cliente'] = $cliente;
    header("Location: ../atualizarCliente.php");
}
// opção acertada pra bebidas :Pronta
if ($opcao == 4) {
    $clienteDAO = new ClienteDAO();
    $clienteDAO->excluirCliente($_REQUEST['cnpj']);
    header("Location:controllerCliente.php?opcao=2");
}

if ($opcao == 5) {
	session_start();
	//$Id = (int)$_SESSION['txtID'];
	$cli = $_SESSION['Cliente'];
	$is = (int)$cli->id_cliente;
	
    $clienteDAO = new ClienteDAO();
    $cliente   = new Cliente($_REQUEST['txtNomeCliente'], $_REQUEST['txtCnpjCliente'], $_REQUEST['txtTelefoneCliente'], $_REQUEST['txtEnderecoCliente'], $_REQUEST['txtEmailCliente'], $_REQUEST['txtSenhaCliente'],$_REQUEST['txtCidade']);
	
    $clienteDAO->atualizarCliente($cliente,$id);

    if ($clientes->admin == 1) {
        header("Location:controllerCliente.php?opcao=2");
    } else {
        header("Location:../index.php");
    }

}

if ($opcao == 6) {
    $email      = strtolower($_REQUEST["email"]);
    $senha      = $_REQUEST["senha"];
    $clienteDAO = new ClienteDAO();
    $cliente    = $clienteDAO->autentica($email, $senha);

    if ($cliente != null) {
        session_start();
        $_SESSION["Cliente"] = $cliente;
        header("Location:../index.php");
    } else {
        header("Location:../login.php?error=1");
    }

}

if ($opcao == 7) {
    session_start();
    session_destroy();
    header("Location:../index.php");
}
