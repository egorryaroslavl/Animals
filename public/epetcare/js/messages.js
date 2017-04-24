 /*
	function initialize(){
		var markers = [];

		var mapOptions = {
			zoom     : 17,
			center   : new google.maps.LatLng( 57.6262484, 39.8838331 ),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map( document.getElementById( 'map' ), mapOptions );
		var geocoder = new google.maps.Geocoder;
		var infowindow = new google.maps.InfoWindow;


		//plot the markers
		var i = 1;
		google.maps.event.addListener( map, 'click', function( event ){

			if( i != 1 ){
				i = 1;
				return false
			}

			for( i in markers ){
				markers[ i ].setMap( null );
			}

			var titleString = "Этот маркер можно перетаскивать.<br>Если его нужно удалить,<br>сделайте на нём двойной клик";
			var infowindow = new google.maps.InfoWindow();
			var marker = new google.maps.Marker(
				{
					position : event.latLng,
					map      : map,
					draggable: true,
					title    : titleString
				} );

			$( "#marker_position" ).val( marker.position );
			infowindow.setContent( titleString );
			infowindow.open( map, marker );
			geocodeLatLng( geocoder, event.latLng );

			/!*		$.ajax( {
			 url          : "https://maps.googleapis.com/maps/api/geocode/json?latlng=57.6262484,39.8838331&key=AIzaSyAsxi6GEZSg79ZgcfaIcaXyVREVQNu5PGA",
			 dataType     : 'jsonp',
			 jsonpCallback: "logResults"

			 } );*!/
			markers.push( marker );
			google.maps.event.addListener( marker, "click", (function( i, marker, infowindow ){
				return function(){
					infowindow.setContent( titleString );
					infowindow.open( map, marker );

				};
			})( i, marker, infowindow ) );

			//remove the markers on double click
			google.maps.event.addListener( marker, "dblclick", function(){
				marker.setMap( null );
			} );
			i++;
		} );


		function geocodeLatLng( geocoder, eventLatLng ){


			var latlng = eventLatLng;
			geocoder.geocode( { 'location': latlng }, function( results, status ){
				if( status === google.maps.GeocoderStatus.OK ){

					if( results ){

						var geocoding_json = $.toJSON( results );

						$.ajax( {
							type   : "POST",
							url    : "/google_geocoding_json_parse",
							data   : {
								geocoding_json: geocoding_json ,
								_token:token()
							},
							success: function( msg ){
								if( msg > 0 ){

								}
							}
						} );

						/!*			 	$( "#sublocality" ).val( results[ 2 ].address_components[0].long_name  );
						 $( "#addressJson" ).val(  	thu  );*!/

					} else{
						window.alert( 'Расположение не найдено!' );
					}
				} else{
					window.alert( 'Geocoder failed due to: ' + status );
				}
			} );
		}


	}


	$( function(){

		function token(  ){
			var token = getElementsByTagName('_token').val();
			return token;
		}


	} );


	//google.maps.event.addDomListener( window, 'load', initialize );*/
