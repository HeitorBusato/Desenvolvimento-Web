function q1(){
		var texto = document.getElementById("paragrafo").textContent;
			alert(texto);
		}
function q2(){
	var x = document.getElementsByTagName('span');
	var i;
	var y = "";
		for (i=0; i < x.length; i++) {
			 y = (y + x[i].textContent) ;
			}
		alert(y);			
}
function q3(){
	var x = document.getElementsByTagName('li');
	var i;
	var y = "";
		for (i=0; i < x.length; i++) {
			if(x[i].textContent == "666"){
				y = x[i].textContent;
				}else{}	
			}
			alert(y);
}
function exibirInnerHTML(){
	var content = document.getElementById("elemento");
	console.log(content);

	var p = document.getElementsByTagName("p");
	console.log(p.innerHTML);

	var strong = document.getElementsByTagName("strong");
	console.log(strong.innerHTML);

	var li = document.getElementById("item");
	console.log(li.innerHTML);
			
}