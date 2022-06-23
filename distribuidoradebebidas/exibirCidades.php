<?php

require_once 'cabecalho.php';
if (!isset($_SESSION)) {
    session_start();
}

$user = $_SESSION["Cliente"];
if ($user->admin == 0) {
    header("Location:index.php");
}
$cidades = $_SESSION['ListaCidades'];
?>

    <div class="container container-titulo" >
        <h2>Cidades Cadastradas</h2>
    </div>

<div class="container container-tbl">
    <div>
        <table class="table table-bordered table-hover table-responsive-md" >
            <tr>
                <th>ID</th>
                <th>Cidade</th>
                <th>estado</th>
                <th>CEP</th>
                <th>Valor do frete por peso</th>
                <th>Operação</th>
            </tr>
    <?php foreach ($cidades as $cidade) {
    ?>
        <tr>
            <td><?php echo $cidade->id_cidade ?></td>
            <td><?php echo $cidade->cidade ?></td>
            <td><?php echo $cidade->estado ?></td>
            <td><?php echo $cidade->CEP ?></td>
            <td><?php echo $cidade->valorfrete_porPeso ?></td>
            <td>
                <a href="controllers/controllerCidade.php?opcao=3&id=<?php echo $cidade->id_cidade ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16">
                      <title>Alterar</title>
                      <path fill-rule="evenodd" d="M0 12v3h3l8-8-3-3-8 8zm3 2H1v-2h1v1h1v1zm10.3-9.3L12 6 9 3l1.3-1.3a.996.996 0 0 1 1.41 0l1.59 1.59c.39.39.39 1.02 0 1.41z"/>
                    </svg>
                </a>
                &nbsp&nbsp&nbsp
                <a  href="controllers/controllerCidade.php?opcao=4&id=<?php echo $cidade->id_cidade ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="16" viewBox="0 0 12 16">
                      <title>Excluir</title>
                      <path fill-rule="evenodd" d="M11 2H9c0-.55-.45-1-1-1H5c-.55 0-1 .45-1 1H2c-.55 0-1 .45-1 1v1c0 .55.45 1 1 1v9c0 .55.45 1 1 1h7c.55 0 1-.45 1-1V5c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm-1 12H3V5h1v8h1V5h1v8h1V5h1v8h1V5h1v9zm1-10H2V3h9v1z"/>
                    </svg>
                </a>
            </td>
        </tr>

<?php }?>
    </table>
    </div>
    </div>
    <div class="container">
        <a href="index.php">
            <button class="btn btn-secondary">Voltar</button>
        </a>
    </div>
<?php require_once 'rodape.php'?>
