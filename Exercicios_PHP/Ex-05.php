<!DOCTYPE html>
<html>
<body>
<?php
	$fah = 0;
	$cel = -16;
	echo "Fahrenheit". " " ."Celsius". "<br>";
for($i = 0; $i<77 ;$i++){
	echo $fah. " " .$cel. "<br>";
     $fah = $fah +2;
     $cel =(($fah - 32)/2);   
}
?>

</body>
</html>
