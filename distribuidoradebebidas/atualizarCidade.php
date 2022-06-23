<?php
require_once 'cabecalho.php';
if (!isset($_SESSION)) {
    session_start();
}
$cidade = $_SESSION['Cidade'];
?>
    <div class="container container-titulo" >
        <h2>Atualizar Cidade</h2>
    </div>
    <div class="container container-form formCliente-button">
        <form action="controllers/controllerCidade.php" method="POST">
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" name="txtID" value="<?php echo $cidade->id_cidade ?>" readonly required>
                </div>
                <div class="form-group">
                    <label>Cidade</label>
                    <input type="text" class="form-control" name="txtDescricao" value="<?php echo $cidade->cidade ?>" required>
                </div>
                <div class="form-group">
                    <label>Estado</label>
                    <input type="text" class="form-control" name="txtUf" value="<?php echo $cidade->estado ?>" required>
                </div>
                <div class="form-group">
                    <label>CEP</label>
                    <input type="text" class="form-control" name="txtCep" value="<?php echo $cidade->CEP ?>" required>
                </div>
                <div class="form-group">
                    <label>Valor do frete por peso</label>
                    <input type="text" class="form-control" name="txtValor" value="<?php echo $cidade->valorfrete_porPeso ?>" required>
                </div>

                <input type="hidden" name="opcao" value="5">
                <button type="submit" class="btn btn-outline-dark">Atualizar</button>
                <a href="exibirCidades.php"><button type="button" class="btn btn-outline-dark">Voltar</button></a>
        </form>

    </div>
<?php require_once 'rodape.php'?>
