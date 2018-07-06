// Get any element clicked inside of body Tag
document.body.addEventListener('click', function(e){
	var target = e.target.className;
	
	if(target.indexOf("menu__link") != -1){
		if(target.indexOf("cart") != -1) {
		$('#content').load("./views/products.html").hide().fadeIn();
		} else if(target.indexOf("stores") != -1) {
				$('#content').load("./views/stores.html").hide().fadeIn();
		} else return false;
	}
	


});