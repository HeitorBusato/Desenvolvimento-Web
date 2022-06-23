<?php
require_once "cabecalho.php";
require_once "dao/bebidaDAO.php";
require_once "model/item.php";
require_once "utils/calcula.php";

$bebidaDAO = new bebidaDAO();
session_start();
$carrinho   = $_SESSION["Carrinho"];
$valorTotal = $_SESSION["ValorTotal"];

function Mask($mask,$str){

    $str = str_replace(" ","",$str);

    for($i=0;$i<strlen($str);$i++){
        $mask[strpos($mask,"#")] = $str[$i];
    }

    return $mask;
}

?>
<div class="container">
        <center><h4>Revise Seus Dados</h4>
        <div class="pag-dados">
            <p>Nome: <?php echo $cliente->nome ?></p>
            <p>CNPJ: <?php echo Mask("##.###.###/####-##",$cliente->cnpj) ?></p>
            <p>Telefone: <?php echo $cliente->telefone ?></p>
            <p>Endereço: <?php echo $cliente->endereco ?></p>
            <p>Email: <?php echo $cliente->email ?></p>
        </div>
        <h4>Seu Pedido</h4></center>
        <div class="pag-dados">
        <div class="container">
            <div class="row">
           <?php
foreach ($carrinho as $item) {
	$bebida = $bebidaDAO->getBebida($item->getBebida());
    echo '<div class="col-sm-6">
    <center><div class="card mb-2" style="max-width: 540px;">
    <div class="row ">
      <div class="col-md-4">
        <img src="imagens/bebidas/' . $bebida->nome . '.jpg" class="card-img">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <p class="card-text">Bebida: ' . $bebida->nome  ." ".$bebida->fabricante.'</p>
          <p class="card-text">Quantidade: ' . $item->getQuantidade()." unidades" .'</p>
        </div>
      </div>
    </div>
  </div>
  </div>';
}
?>

        </div>
    </div>
</div>
    <div class="pag-dados">
        <h3 class="valorTotal">VALOR TOTAL:<?php echo " R$" . $valorTotal ?></h3>
    </div>

<div class="botoes-finalizar">
    <a href="controllers/controllerCarrinho.php?opcao=3"><button class="btn btn-outline-dark">Voltar</button></a>
    <a href="controllers/controllerCompra.php?opcao=2"><button class="btn btn-outline-dark">Pagar</button></a>
</div>
</div>

<?php
require_once "rodape.php";
?>
