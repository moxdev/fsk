document.addEventListener('DOMContentLoaded', function () {
	if (document.querySelectorAll('#map-canvas').length > 0) {
		if (document.querySelector('html').lang)
			lang = document.querySelector('html').lang;
		else
			lang = 'en';

		var js_file = document.createElement('script');
		js_file.type = 'text/javascript';
		js_file.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAte2D0BxrRUx5XfIO4yhvdPc8lyY_KRtA&callback=initialize&language=' + lang;
		document.getElementsByTagName('body')[0].appendChild(js_file);
	}
});

function initialize() {
	// VARIABLES WE WILL NEED
	var infowindow = new google.maps.InfoWindow();

	// SET OUR MAP OPTIONS
	var myOptions = {
		zoom:18,
		center: new google.maps.LatLng(latitude,longitude),
		zoomControlOptions: {
			position: google.maps.ControlPosition.RIGHT_BOTTOM
		},

		/// ADD AND REMOVE SOME DEFAULT MAP CONTROLS
		//zoomControl: false,
		//mapTypeControl: false,
		scrollwheel: false,
		panControl:false,
		rotateControl:false,
		streetViewControl:false,

		// ADD ALL OF THE MAP TYPES THAT WE WANT TO USE IN OUR MAP
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.HYBRID, google.maps.MapTypeId.TERRAIN, google.maps.MapTypeId.SATELLITE]
		}, mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	// LOAD THE MAP
	var map = new google.maps.Map(document.getElementById('map-canvas'), myOptions);

	var marker = new google.maps.Marker({
    	position: new google.maps.LatLng(latitude,longitude),
		map: map,
		//icon:image,
		zIndex: 1000
   });
}

// google.maps.event.addDomListener(window, 'load', initialize);