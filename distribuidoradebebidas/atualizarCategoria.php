<?php
require_once 'cabecalho.php';
//session_start();
$categoria = $_SESSION['Categoria'];
?>
    <div class="container container-titulo" >
        <h2>Atualizar Categoria</h2>
    </div>
    <div class="container container-form formCliente-button">
        <form action="controllers/controllerCategoria.php" method="POST">
            <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" name="txtID" value="<?php echo $categoria->id_categoria ?>" readonly required>
                </div>

                <div class="form-group">
                    <label>Descrição</label>
                    <input type="text" class="form-control" name="txtDescricao" value="<?php echo $categoria->descricao ?>" required>
                </div>

                <input type="hidden" name="opcao" value="5">
                <button type="submit" class="btn btn-outline-dark">Atualizar</button>
                <a href="exibirCategorias.php"><button type="button" class="btn btn-outline-dark">Voltar</button></a>
        </form>

    </div>
<?php require_once 'rodape.php'?>
