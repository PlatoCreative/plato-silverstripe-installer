
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>
	var map,
		MY_MAPTYPE_ID = 'custom_style';
	function initializeMap() {
		var featureOpts = [
    		{
    			stylers: [
    				//{saturation : -100},
    				//{gamma : 0}
    			]
    		},
    		{
    			elementType : 'labels',
    			stylers : [
    				{visibility: 'on'}
    			]
    		}
		];
		var mapOptions = {
			zoom : 16,
			scrollwheel : false,
			center : new google.maps.LatLng($LatLong.Latitude, $LatLong.Longitude),
			mapTypeControlOptions : {
				mapTypeIds : [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
			},
			mapTypeId : MY_MAPTYPE_ID
		};

		map = new google.maps.Map(document.getElementById('contact-map'), mapOptions);
		var styledMapOptions = {name: 'Custom'},
			customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);
		map.mapTypes.set(MY_MAPTYPE_ID, customMapType);

		var marker = new google.maps.Marker({
			position: new google.maps.LatLng($LatLong.Latitude, $LatLong.Longitude),
			//icon: '{$ThemeDir}/images/pin-large.png',
			map: map
		});
	}
	google.maps.event.addDomListener(window, 'load', initializeMap);
	google.maps.event.clearListeners(window, 'onscroll');
</script>
