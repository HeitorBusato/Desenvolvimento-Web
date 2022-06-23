<?php
require_once 'cabecalho.php';
require_once 'dao/cidadeDAO.php';
if (!isset($_SESSION)) {
    session_start();
}
$cliente = $_SESSION['Cliente'];
?>
    <div class="container container-titulo" >
        <h2>Atualizar Cliente</h2>
    </div>
    <div class="container container-form formCliente-button">
        <form action="controllers/controllerCliente.php" method="POST">
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" name="txtID" value="<?php echo $cliente->id_cliente ?>" readonly required>
                </div>
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text"  class="form-control" name="txtNomeCliente" value="<?php echo $cliente->nome ?>" required>
                </div>
                <div class="form-group">
                    <label>CNPJ</label>
                    <input type="text"  class="form-control" name="txtCnpjCliente" value="<?php echo $cliente->cnpj ?>" readonly required>
                </div>
                <div class="form-group">
                    <label>Celular</label>
                    <input type="text" onkeypress="$(this).mask('(00) 00000-0000')" class="form-control" name="txtTelefoneCliente" value="<?php echo $cliente->telefone ?>" required >
                </div>
                <div class="form-group">
                    <label>Endereço</label>
                    <input type="text" class="form-control" name="txtEnderecoCliente" value="<?php echo $cliente->endereco ?>" required >
                </div>
				
				<div class="form-group">
                <label>Cidade</label>
   
             <select class="form-control" name="txtCidade">

			<?php      
    
				$cidadeDAO = new CidadeDAO();
				$cidades   = $cidadeDAO->getCidades();
				foreach ($cidades as $cid) {
				if ($cid->id_cidade == $cliente->id_cidade) {
					echo "<option value='$cid->id_cidade' selected>$cid->cidade</option>";
					} else {
					echo "<option value='$cid->id_cidade'>$cid->cidade</option>";
					}
				}
			?>
                </select>
            </div>
				
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="txtEmailCliente" value="<?php echo $cliente->email ?>" required>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" class="form-control" name="txtSenhaCliente" value="<?php echo $cliente->senha ?>" required>
                </div>

                <input type="hidden" name="opcao" value="5">
                <button type="submit" class="btn btn-outline-dark">Atualizar</button>
                <a href="exibirClientes.php"><button type="button" class="btn btn-outline-dark">Voltar</button></a>
        </form>

    </div>
<?php require_once 'rodape.php'?>
