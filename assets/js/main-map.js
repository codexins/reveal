
(function(){

	var map;

	map = new GMaps({
		el: '#gmap',
		lat: reveal_map_params.ev_lat,
		lng: reveal_map_params.ev_long,
		scrollwheel:false,
		zoom: 16,
		zoomControl : true,
		panControl : false,
		streetViewControl : false,
		mapTypeControl: true,
		overviewMapControl: false,
		clickable: false
	});

	var image = reveal_map_params.ev_mkr;
	map.addMarker({
		lat: reveal_map_params.ev_lat,
		lng: reveal_map_params.ev_long,
		icon: image,
		animation: google.maps.Animation.DROP,
		verticalAlign: 'bottom',
		horizontalAlign: 'center',
		backgroundColor: '#3e8bff',
	});


	var styles = [];

	map.addStyle({
		styledMapName:"Styled Map",
		styles: styles,
		mapTypeId: "map_style"  
	});

	map.setStyle("map_style");
}());