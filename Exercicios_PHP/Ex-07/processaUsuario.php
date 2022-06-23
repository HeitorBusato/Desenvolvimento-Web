<?php
include 'classes.inc';

$nome = $_REQUEST['nome'];
$email = $_REQUEST['login'];
$senha = $_REQUEST['senha'];

$NovoUsuario = new Usuario($nome, $email, $senha);

setcookie("Usuarionome", $nome);
setcookie("usuarioemail", $email);
setcookie("usuariosenha", $senha);

echo "Login Criado com sucesso!";

?>

 <!DOCTYPE html>
 <html> 
   <head>
     <meta charset="utf-8">
   </head>
   <body>
   	<center>
		
	   	<h3>Acessar Página de Login: </h3><a href="Login.php">link</a>

	   
	</center>
   </body>
 </html>