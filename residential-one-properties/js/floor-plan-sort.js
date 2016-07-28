function hasClass(element, className) {
	return element.className && new RegExp("(^|\\s)" + className + "(\\s|$)").test(element.className);
}

var plan_links = document.getElementById('plan-nav').getElementsByTagName('a');
var plans = document.getElementById('plans-wrapper').children;

//console.log(plan_links);
//console.log(plans);

for (var i = 0; i < plan_links.length; i++) {
	plan_links[i].onclick = function() {
		var trigger_class = this.classList[0];
    	for(var j = 0; j < plan_links.length; j++) {
    		plan_links[j].classList.remove('active');
    	}
    	setTimeout(function(){
			for(var k = 0; k < plan_links.length; k++) {
				if(hasClass(plan_links[k], trigger_class) === true) {
					plan_links[k].classList.add('active');
				}
			}
		}, 10);
    	
    	for(var l = 0; l < plans.length; l++) {
	    		plans[l].classList.remove('active');
	    	}
	    	setTimeout(function(){
				for(var m = 0; m < plans.length; m++) {
					plans[m].style.display = 'none';
					if(hasClass(plans[m], trigger_class) === true) {
						plans[m].style.display = 'block';
						plans[m].classList.add('active');
					}
				}
			}, 300);

		return false;
    };
}