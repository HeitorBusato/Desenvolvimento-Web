<?php require_once 'cabecalho.php'?>

    <div class="container container-titulo">
        <h2>Cadastro de Categorias</h2>
    </div>

    <div class="container container-form">
        <form  action="controllers/controllerCategoria.php" method="POST">

            <div class="form-group">
                <label>Nome da Categoria</label>
                <input type="text" class="form-control" name="txtDescricao" required>
            </div>
            <div class="formCategoria-button">
                <button type="submit" class="btn btn-outline-dark">Cadastrar</button>
                <button type="reset" class="btn btn-outline-dark">Limpar</button>
                <a href="index.php"><button type="button" class="btn btn-outline-dark">Voltar</button></a>
            </div>

            <input type="hidden" name="opcao" value="1">
        </form>

    </div>
<?php require_once 'rodape.php'?>
