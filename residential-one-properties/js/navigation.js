/**
 * File navigation.js.
 *
 */
function hasClass(element, className) {
	return element.className && new RegExp("(^|\\s)" + className + "(\\s|$)").test(element.className);
}

var button = document.getElementById('mobile-toggle');
var nav = document.getElementById('site-navigation-mobile');
var body = document.body;

button.onclick = function() {
	// DEFINE WHAT WE WANT TO USE AS OUR ACTIVE CLASS NAME
	var active_class = 'open';

	var btn_class_name = this.getAttribute('class');
	var nav_class_name = nav.getAttribute('class');
	var body_class_name = body.getAttribute('class');
	
	if(hasClass(this, active_class) === true ) {
		body_class_name = body_class_name.replace(active_class, '');
		body.setAttribute('class', body_class_name);

		btn_class_name = btn_class_name.replace(active_class, '');
		button.setAttribute('class', btn_class_name);

		nav_class_name = nav_class_name.replace(active_class, '');
		nav.setAttribute('class', nav_class_name);
		setTimeout(function(){
		  nav.style.visibility='hidden';
		  nav.style.display='none';
		}, 650);

	} else {
		body_class_name = body_class_name += ' ' + active_class;
		body.setAttribute('class', body_class_name);

		btn_class_name = btn_class_name += ' ' + active_class;
		button.setAttribute('class', btn_class_name);

		nav_class_name = nav_class_name += ' ' + active_class;
		nav.style.visibility='visible';
		nav.style.display='block';
		setTimeout(function(){
			nav.setAttribute('class', nav_class_name);
		}, 50);
	}
};	