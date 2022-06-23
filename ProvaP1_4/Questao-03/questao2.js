$(function(){
				$("#btn1").click(function(){
					 alert($('ul#myList li').eq(2));
				});
			});
			
$(function(){
		$("#btn2").click(function(){
					
		$('ul#myList li:contains("par")').remove();

			
	});
});