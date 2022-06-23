function listar(){
	
	var listItems = document.getElementsByTagName("ul")[0];
	var qtdItens = document.getElementsByTagName("li");

	document.write("<p> Ha  " + qtdItens.length + " elementos 'li'</p>");
	document.write("<p>Texto dentro dos elementos li: </p>" + listItems.innerHTML);

}