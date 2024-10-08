// function initialize() {
// 	var myOptions = {
// 		zoom: 15,
// 		center: new google.maps.LatLng(40.751412, -73.966302), //change the coordinates
// 		mapTypeId: google.maps.MapTypeId.ROADMAP,
// 		scrollwheel: false,
// 		mapTypeControl: false,
// 		zoomControl: false,
// 		streetViewControl: false
// 	}
// 	var img_icon = 'img/map-marker.png';
// 	var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
// 	var marker = new google.maps.Marker({
// 		map: map,
// 		icon: img_icon,
// 		position: new google.maps.LatLng(40.747508, -73.966302) //change the coordinates
// 	});
// 	google.maps.event.addListener(marker, "click", function() {
// 		infowindow.open(map, marker);
// 	});
// }
// google.maps.event.addDomListener(window, 'load', initialize);

	function initialize() {
		var myOptions = {
		zoom: 15,
		center: new google.maps.LatLng(40.751412, -73.966302), // Change the coordinates
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false,
		mapTypeControl: false,
		zoomControl: false,
		streetViewControl: false
		};
		var img_icon = 'img/map-marker.png';
		var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
	
		// Create an info window with some content (replace with your desired content)
		var infowindow = new google.maps.InfoWindow({
		content: "<h1>Marker Location</h1><p>This is some info about the marker location.</p>"
		});
	
		var marker = new google.maps.Marker({
		map: map,
		icon: img_icon,
		position: new google.maps.LatLng(40.747508, -73.966302) // Change the coordinates
		});
	
		google.maps.event.addListener(marker, "click", function() {
		infowindow.open(map, marker);
		});
	}
	
	google.maps.event.addDomListener(window, 'load', initialize);
