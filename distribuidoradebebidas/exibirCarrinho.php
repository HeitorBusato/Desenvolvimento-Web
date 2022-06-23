<?php
require_once "cabecalho.php";
require_once "dao/bebidaDAO.php";
require_once "dao/cidadeDAO.php";
require_once "model/item.php";
require_once "utils/calcula.php";

$bebidaDAO = new bebidaDAO();
session_start();
if (isset($_SESSION["Carrinho"])) {
    $carrinho = $_SESSION["Carrinho"];
} else {
    $carrinho = array();
}

if (isset($_SESSION["Cliente"])) {
    $cliente = $_SESSION["Cliente"];
}
$cidadeDAO = new cidadeDAO();
$cidade = $cidadeDAO->getCidade($cliente->id_cidade);
$Frete = $cidade->valorfrete_porPeso;
?>
						<center><h4>Bebidas Selecionados para a Compra</h4></center>
						<br>
<div class="container">
  <div class="row ">
      <?php
	  
$Peso      = 0;
$index      = 0;
$valorTotalbebidas = 0;
$valorfrete = 0;

foreach ($carrinho as $item) {
    $bebida = $bebidaDAO->getBebida($item->getBebida());
	 $data = new DateTime($bebida->dataFabricacao);
    echo "<div class='card col-md-12 mb-3 '>
        <div class='row no-gutters card-carrinho'>
          <div class='col-md-4'>
            <img class='img-thumbnail card-img' src='imagens/bebidas/" . $bebida->nome . ".jpg'>
          </div>
      <div class='col-md-8'>
        <div class='card-body'>
          <h5 class='card-title'>" . $bebida->nome . "</h5>
		  <BR>
          <p class='card-text'> " . "Descrição: " . $bebida->descricao . "</p><p class='card-text'> " . "Fabricante: " . $bebida->fabricante . "</p>
          <p class='card-text'> " . "Data de Fabricação: " . $data->format('d-m-Y'). "</p><p class='card-text'> " . "Volume: " . $bebida->volume . "</p>
          <p class='card-text'> " . "Quantidade de Itens: " . $item->getQuantidade() . "</p><p class='card-text'> " . "Subtotal dos Itens: R$ " . $item->getValorTotal() . "</p>
          <a href='controllers/controllerCarrinho.php?opcao=2&index=$index'><button class='btn btn-outline-dark' >Remover Bebida</button></a>
        </div>
      </div>
    </div>
  </div>";
	$Peso = $Peso + (($bebida->peso)*($item->getQuantidade()));
	
    $valorTotalbebidas = $valorTotalbebidas + $item->getValorTotal();
    $index++;

}
$valorfrete = $Frete * $Peso;
$valorTotal = ($valorTotalbebidas + $valorfrete);
?>
 	
	
  </div>
</div>
<br>
<div class="container">
  <center>
  
	<h5>Valor Frete por KG para <?php echo $cidade->cidade?>/<?php echo $cidade->estado?>: R$ <?php echo $Frete ?></h5>
	<h5>Peso Total das Bebidas: <?php echo $Peso ?> KG</h5>
	<h5>Valor Total do Frete: R$ <?php echo $valorfrete ?></h5>
	<h5>Valor Total das Bebidas: R$ <?php echo $valorTotalbebidas ?></h5>
	<h5>Valor Total: R$ <?php echo $valorTotal?></h5>
	<br>
	<?php $_SESSION["ValorTotalFrete"] = $valorfrete?>
	<?php $_SESSION["ValorTotal"] = $valorTotal?>
	
	<a id="botaoEsvaziarCarrinho" href="controllers/controllerCarrinho.php?opcao=4"><button type="submit" class="btn btn-outline-dark">Esvaziar Carrinho</button></a>
	<a href="bebidas.php"><button class="btn btn-outline-dark">Adicionar Bebidas</button></a>
	<a id="botaoFinalizarCompra" href="controllers/controllerCompra.php?opcao=1"><button type="submit" class="btn btn-outline-dark">Finalizar Compra</button></a>	
	
  </center>
</div>


<?php
if (isset($_REQUEST["status"])) {
    if ($_REQUEST["status"] == 1) {
        echo "<script type='text/javascript'>
          window.onload = function(){
            var compra = document.getElementById('botaoFinalizarCompra');
            compra.remove();
            alert('Carrinho Vazio');
          }
        </script>";
    }
}
?>
<?php
if (isset($_REQUEST["status"])) {
    if ($_REQUEST["status"] == 2) {
        echo "<script type='text/javascript'>
          window.onload = function(){
            alert('O item já se encontra no carrinho!!!');
            alert('Para adicionar uma quantidade maior, remova a bebida do carrinho e a adicione com a nova quantidade.');
          }
        </script>";
    }
}
?>

<?php
require_once "rodape.php";
?>
