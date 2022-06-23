<!DOCTYPE html>
<html>
<body>
<?php 
  $nota1 = 8;
  $nota2 = 7;
  $nota3 = 8;
  $nome = "Heitor";
  
  $media = ($nota1 + $nota2 + $nota3)/3;
  
  if($media > 7 ){
	  echo "Nome: $nome ";
	  echo "Média: $media ";
	  echo "Situação: Aprovado";
  }else{
	  if($media <=4){
			echo "Nome: $nome ";
			echo "Média: $media ";
			echo "Situação: Reprovado";
	  }else{
		    echo "Nome: $nome ";
			echo "Média: $media ";
			echo "Situação: Prova Final";
	  }
  }
?>
</body>
</html>
