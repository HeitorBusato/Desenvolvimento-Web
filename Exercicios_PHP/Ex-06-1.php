<?php
$idade = $_REQUEST['idade'];

$resul = (($idade-6)/4.4)+((2.3*($idade-6))+22);

?>

 <!DOCTYPE html>
 <html> 
   <head>
     <meta charset="utf-8">
   </head>
   <body>
   	<center>
		
	   	<h3>Peso Normal: <?=$resul?></h3>
	   
	</center>
   </body>
 </html>