<?php include_once 'cabecalho.php'?>
<script type="text/javascript" src="js/validador.js"></script>
 <div class="container">
  <div class="row">
    <div class="col">
	<h2>Bem vindo ao Alegre Bar!</h2>
     <p>A melhor distribuidora de bebidas da região. <br>
	   Se você é uma empresa e está procurando por bebidas de qualidade e com preço justo, então você está no lugar certo!<br>
	  Aqui você encontra os mais variados tipos de bebidas com qualidade e preços que vão te surpreender.
	  Faça o seu <a class="dark-grey-text" href="login.php">Cadastro</a> e venha conferir! </p>
    </div>
  </div>
 </div>
 
<?php
//encaminha o usuário para a tela de login caso nao logado
 

if (isset($_SESSION["Cliente"])) {
    $cliente = $_SESSION["Cliente"];
    if ($cliente->admin == 0 || $cliente->admin == 1) {
        include_once "Carousel.php";
    } 
}else {
        include_once "CarouselLogin.php";
    }

session_write_close();
?>

<?php include_once 'rodape.php'?>
