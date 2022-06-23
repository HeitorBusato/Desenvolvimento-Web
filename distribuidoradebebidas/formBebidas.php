<?php
require_once 'cabecalho.php';
require_once 'dao/categoriaDAO.php';
?>
<div class="container container-titulo">
    <h2>Cadastro de Bebidas</h2>
</div>
    <div class="container container-form">
        <form action="controllers/controllerBebidas.php" method="POST">

            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="txtNomeBebida" required>
            </div>
			
			<div class="form-group">
                <label>Descricao</label>
                <input type="text" class="form-control" name="txtDescricaoBebida" required>
            </div>
			
			<div class="form-group">
                <label>Volume(ml)</label>
                <input type="text" class="form-control" name="txtVolumeBebida" required>
            </div>

            <div class="form-group">
                <label>Preço</label>
                <input type="text" class="form-control" name="txtPrecoBebida" required>
            </div>

            <div class="form-group">
                <label>Peso</label>
                <input type="text" class="form-control" name="txtPesoBebida" required>
            </div>

            <div class="form-group">
                <label>Quantidade em Estoque</label>
                <input type="text" class="form-control" name="txtQde_estoqueBebida">
            </div>

            <div class="form-group">
                <label>Fabricante</label>
                <input type="text" class="form-control" name="txtFabricanteBebida" required>
            </div>

            <div class="form-group">
                <label>Data de Fabricação</label>
                <input type="date" class="form-control" name="txtDataFabricacaoBebida" required>
            </div>

            <div class="form-group">
                <label>Categoria</label>
                <select class="form-control" name="txtCategoriaBebida" required>
                  <?php
$categoriaDAO = new CategoriaDAO();
$categorias   = $categoriaDAO->getCategorias();
foreach ($categorias as $cat) {
    echo "<option value='$cat->id_categoria'>$cat->descricao</option>";
}
?>
                </select>
            </div>
            <div class="formCliente-button">
                <button type="submit" class="btn btn-outline-dark">Cadastrar</button>
                <button type="reset" class="btn btn-outline-dark">Limpar</button>
                <a href="index.php" =><button type="button" class="btn btn-outline-dark">Voltar</button></a>
            </div>
            <input type="hidden" name="opcao" value="1">
        </form>

    </div>
<?php include_once 'rodape.php'?>
