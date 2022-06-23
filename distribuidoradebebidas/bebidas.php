<?php

require_once 'cabecalho.php';
require_once 'dao/categoriaDAO.php';
require_once 'dao/bebidaDAO.php';

if (!isset($_SESSION)) {
    session_start();
}
?>

<script type="text/javascript" src="js/validador.js"></script>
<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-3 p-0 ">

     
      <div class="border rounded p-3">
      <center><h5>Categoria das Bebidas</h5></center>
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
		<form action="bebidasCategoria.php" method="POST">
		<div class="form-group">
                   
             <select class="form-control" name="txtCategoriaBebida">
          <?php
		  
			$categoriaDAO = new CategoriaDAO();
			$categorias   = $categoriaDAO->getCategorias();
			foreach ($categorias as $cat) {
				if ($cat->id_categoria == $bebida->id_categoria) {
			echo "<option value='$cat->id_categoria' selected>$cat->descricao</option>";
			} else {
				echo "<option value='$cat->id_categoria'>$cat->descricao</option>";
		}
}
    ?>
	</select>
            </div>
		          
        </li>
      </ul>
      <hr class="d-sm-none">
	  
	         <center><button type="submit" class="btn btn-outline-dark">Filtrar</button></center>
				    
                
        </form>
      </div>
    </div>
	
    <div class="col-sm-9">
      <?php
	
$bebidaDAO           = new bebidaDAO();
$bebidas             = $bebidaDAO->getBebidas();
$bebidasEstoque = array();
foreach ($bebidas as $bebida) {
	
	
    if ($bebida->qde_estoque > 0) {//verificando estoque antes de exibir bebidas disponiveis
        $bebidasEstoque[] = $bebida;
    }
}
foreach ($bebidasEstoque as $bebida) {
    $categoria = $categoriaDAO->getDescricao($bebida->id_categoria);
    $valor    = $bebida->preco;
    $descricao = $bebida->descricao;
    $fabricante = $bebida->fabricante;
	$quantidade = $bebida->qde_estoque;
	$volume = $bebida->volume;
	
    ?>
      <div class="card mb-3">
        <div class="card-header">
          <center><h5 class="text-muted"><?php echo $categoria->descricao ?></h5></center>
        </div>
        <div class="card-body">
          <div class="row">
			  <div class="col-sm-4">
              <center><h5><?php echo $bebida->nome ?></h5></center>
              <img class="card-img-top" src="imagens/bebidas/<?php echo $bebida->nome ?>.jpg" style="width: 15rem">
           </div>
            <div class="col-sm-4">
               <ul class="list-group list-group-flush">   
			   
			  <li class='list-group-item'><p>Descrição: <?php echo $descricao ?></p></li>
			  <li class='list-group-item'><p>Fabricante: <?php echo $fabricante ?></p></li>
			  <li class='list-group-item'><p>Volume: <?php echo $volume?></p></li>
			               
            </div>
            <div class="col-sm-4 d-flex flex-column bd-highlight align-items-center justify-content-center">
              <h3 class="mb-5" style="color:#fd7e14">R$ <?php echo $valor?>/UN.</h3>
              
				
					
					<form action="controllers/controllerCarrinho.php?opcao=1" method="POST">
					<form name="" method="post" />
					<center><input value=1 id=demoInput name=txtQuantidade type=number onkeydown="return false" min="1" max="<?php echo  htmlspecialchars($quantidade);?>"></center>
					<input type="hidden" name="idbebida" value="<?php echo $bebida->id_bebida?>">
					<button type="submit" class="btn btn-outline-dark">Adicionar ao Carrinho</button>
					</form>
								
				
            </div>
          </div>
        </div>
      </div>
      <?php
}
?>
    </div>
  </div>

</div>

<?php require_once 'rodape.php'?>
