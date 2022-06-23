function adicionar() {

	var botao = document.getElementById("texto").value;
	if(botao != ''){
	var lista  = document.getElementById("lista").innerHTML;

	lista = lista +"<li>"+botao+"</li>";
	document.getElementById("lista").innerHTML = lista;
	}else{
		alert("Campo Vazio!");
	}
	
}
function limpaCampo(){
     document.getElementById("texto").value = '';
}
function getFocus() {
  document.getElementById("texto").focus();
}
function listar(){
	
	var listItems = document.getElementsByTagName("ul")[0];
	var qtdItens = document.getElementsByTagName("li");

	document.write("<p> Ha  " + qtdItens.length + " elementos 'li'</p>");
	document.write("<p>Texto dentro dos elementos li: </p>" + listItems.innerHTML);

}

