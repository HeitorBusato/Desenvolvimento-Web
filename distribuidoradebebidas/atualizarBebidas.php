<?php
require_once 'cabecalho.php';
require_once 'dao/categoriaDAO.php';



if (!isset($_SESSION)) {
    session_start();
}

$bebida = $_SESSION['bebida'];
?>
	
    <div class="container container-form formCliente-button">
        <form action="controllers/controllerBebidas.php" method="POST">

            <div class="form-group">
                <label>ID</label>
                <input type="text" class="form-control" name="txtIdBebida" value ="<?php echo $bebida->id_bebida ?>" readonly required>
            </div>

            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="txtNomeBebida" value="<?php echo $bebida->nome ?>"required>
            </div>
			
			<div class="form-group">
                <label>Descricao</label>
                <input type="text" class="form-control" name="txtDescricaoBebida" value="<?php echo $bebida->descricao ?>"required>
            </div>

            <div class="form-group">
                <label>Volume (ml)</label>
                <input type="text" class="form-control" name="txtVolumeBebida" value="<?php echo $bebida->volume ?>"required>
            </div>

            <div class="form-group">
                <label>Preço</label>
                <input type="text" class="form-control" name="txtPrecoBebida" value="<?php echo $bebida->preco ?>" required>
            </div>

            <div class="form-group">
                <label>Peso</label>
                <input type="text" class="form-control" name="txtPesoBebida" value="<?php echo $bebida->peso ?>">
            </div>

            <div class="form-group">
                <label>Quantidade em Estoque</label>
                <input type="text" class="form-control" name="txtQde_estoqueBebida" value="<?php echo $bebida->qde_estoque ?>" required>
            </div>

            <div class="form-group">
                <label>Fabricante</label>
                <input type="text" class="form-control" name="txtFabricanteBebida" value="<?php echo $bebida->fabricante ?>" required>
            </div>
			
			<div class="form-group">
                <label>Data de Fabricação</label>
                <input type="date" class="form-control" name="txtDataFabricacaoBebida" value="<?php echo $bebida->dataFabricacao ?>" required>
            </div>

            <div class="form-group">
                <label>Categoria</label>
   
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

                <button type="submit" class="btn btn-outline-dark">Atualizar</button>
                <a href="exibirBebidas.php" =><button type="button" class="btn btn-outline-dark">Voltar</button></a>

            <input type="hidden" name="opcao" value="5">
        </form>

    </div>
<?php require_once 'rodape.php'?>
