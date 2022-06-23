<?php

$codProduto = filter_input(INPUT_POST, "codProduto");
$qtdProduto = filter_input(INPUT_POST, "qtdProduto");
$resul = "";

  switch($codProduto){
    case "1001":
         $resul = ($qtdProduto*5.32);
    break;
    case "1324":
        $resul = ($qtdProduto*6.45);
    break;
    case "6548":
        $resul = ($qtdProduto*2.37);
    break;
    case "0987":
        $resul = ($qtdProduto*5.32);
    break;
    case "7623":
        $resul = ($qtdProduto*6.45);
    break;
  }


?>

 <!DOCTYPE html>
 <html> 
   <head>
     <meta charset="utf-8">
   </head>
   <body>
   <center>
     <form method="post">
       <label>Código do Produto: <input type="text" name="codProduto"/></label><br>
       <label>Quantidade: <input type="text" name="qtdProduto"/></label><br>
       <input type="submit" name="Calcular" value="Calcular">
       
       <h3>Valor total: R$ <?=$resul?></h3>
     </form>
     </center>
   </body>
 </html>