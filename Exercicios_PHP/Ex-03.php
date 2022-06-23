<?php

echo "  Ano   |"." Depreciacao  |"." Valor no fim do ano |"." Depreciacao Acumulada   |"."<br>";

$valor=28000;
$acumulada=0;

for ($i=1; $i<8; $i++){
    $ano=$i;
    $depreciacao=4000;
    $valor=$valor-4000;
    $acumulada=$acumulada+4000;

    echo "<tr> <td>".$ano."     |".$depreciacao."    |".$valor."      |".$acumulada."<br> </td> </tr>";
}

?>
