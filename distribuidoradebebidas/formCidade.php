<?php require_once 'cabecalho.php'?>

    <div class="container container-titulo">
        <h2>Cadastro de Cidades</h2>
    </div>

    <div class="container container-form">
        <form  action="controllers/controllerCidade.php" method="POST">

            <div class="form-group">
                <label>Nome da Cidade</label>
                <input type="text" class="form-control" name="txtDescricao" required>
            </div>
            <div class="form-group">
                <label>Estado - UF</label>
                <input type="text" class="form-control" name="txtUf" required>
            </div>
            <div class="form-group">
                <label>CEP</label>
                <input type="text" class="form-control" name="txtCep" required>
            </div>
            <div class="form-group">
                <label>Valor do Frete por Peso</label>
                <input type="text" class="form-control" name="txtValor" required>
            </div>

            <div class="formCliente-button">
                <button type="submit" class="btn btn-outline-dark">Cadastrar</button>
                <button type="reset" class="btn btn-outline-dark">Limpar</button>
                <a href="index.php"><button type="button" class="btn btn-outline-dark">Voltar</button></a>
            </div>

            <input type="hidden" name="opcao" value="1">
        </form>

    </div>
<?php require_once 'rodape.php'?>
