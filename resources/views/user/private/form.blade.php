<form name="messageForm" method="post" action="/user/{{ $data->category }}/message_create"
      enctype="multipart/form-data" id="user-form">
	<div class="row">
		<div class="col-xs-4">
			{{Form::bcSelect('Кто?','animal',config('site_settings.animal',''), null)}}
		</div>
		<div class="col-xs-4">
			{{ Form::bcText( 'Когда?',  'date' ,$data->date ) }}
		</div>
		<div class="col-xs-4">
			{{Form::bcSelect('Возраст','ago',config('site_settings.dog.ago','0'), null )}}
		</div>
	</div>


	<div class="row">
		<div class="col-xs-12">
			{{Form::bcText( 'Где?',  'where' ,null,[ ]) }}
			{{Form::bcTextarea( 'Опишите обстоятельства',  'how' ,null,['placeholder'=>'Опишите обстоятельства','rows'=>3])}}
			{{Form::hidden('administrative_area_level_1','',['id'=>'administrative_area_level_1'])}}{{-- область --}}
			{{Form::hidden('locality','',['id'=>'locality'])}}{{-- город --}}
			{{Form::hidden('sublocality_level_2','',['id'=>'sublocality_level_2'])}}{{-- район города --}}
			{{Form::hidden('route','',['id'=>'route'])}}{{-- улица --}}
			{{Form::hidden('street_number','',['id'=>'street_number'])}}{{-- дом --}}
			{{Form::hidden('marker_position','',['id'=>'marker_position'])}}
			{{Form::hidden('formatted_address','',['id'=>'formatted_address'])}}
			<label onclick="$(this).next().slideToggle(900)">Укажите место на карте</label>
			 	<div id="map" class="mt-10" style="width:100%;height:20.0rem;clear: both;margin-bottom: 20px"></div>

		</div>
	</div>


	<div class="row">
		<div class="col-xs-12">
			<label onclick="$(this).next().slideToggle(900)">Добавьте фотографии</label>
			<link href="/assets/js/fine-uploader/fine-uploader-gallery.min.css" rel="stylesheet">
			<script src="/assets/js/fine-uploader/fine-uploader.min.js"></script>
			<script type="text/template" id="qq-template">
				<div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Бросьте файлы сюда">
					<div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
						<div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
						     class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
					</div>
					<div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
						<span class="qq-upload-drop-area-text-selector"></span>
					</div>
					<div class="qq-upload-button-selector qq-upload-button">
						<div>Загрузить фото</div>
					</div>
					<span class="qq-drop-processing-selector qq-drop-processing">
                <span>Идёт загрузка...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
					<ul
						class="qq-upload-list-selector qq-upload-list"
						role="region"
						aria-live="polite"
						aria-relevant="additions removals">
						<li>
							<span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
							<div class="qq-progress-bar-container-selector qq-progress-bar-container">
								<div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
								     class="qq-progress-bar-selector qq-progress-bar"></div>
							</div>
							<span class="qq-upload-spinner-selector qq-upload-spinner"></span>
							<div class="qq-thumbnail-wrapper">
								<img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>
							</div>
							<button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>
							{{--<button type="button" class="qq-upload-retry-selector qq-upload-retry">
								<span class="qq-btn qq-retry-icon" aria-label="Retry"></span>
								Обновить
							</button>--}}

							<div class="qq-file-info">
								<div class="qq-file-name">
									<span class="qq-upload-file-selector qq-upload-file"></span>
									<span class="qq-edit-filename-icon-selector qq-btn qq-edit-filename-icon"
									      aria-label="Edit filename"></span>
								</div>
								<input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
								<span class="qq-upload-size-selector qq-upload-size"></span>
								<button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
									<span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
								</button>
								<button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
									<span class="qq-btn qq-pause-icon" aria-label="Pause"></span>
								</button>
								<button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
									<span class="qq-btn qq-continue-icon" aria-label="Continue"></span>
								</button>
							</div>
						</li>
					</ul>

					<dialog class="qq-alert-dialog-selector">
						<div class="qq-dialog-message-selector"></div>
						<div class="qq-dialog-buttons">
							<button type="button" class="qq-cancel-button-selector">Отменить</button>
						</div>
					</dialog>

					<dialog class="qq-confirm-dialog-selector">
						<div class="qq-dialog-message-selector"></div>
						<div class="qq-dialog-buttons">
							<button type="button" class="qq-cancel-button-selector">Нет</button>
							<button type="button" class="qq-ok-button-selector">Да</button>
						</div>
					</dialog>

					<dialog class="qq-prompt-dialog-selector">
						<div class="qq-dialog-message-selector"></div>
						<input type="text">
						<div class="qq-dialog-buttons">
							<button type="button" class="qq-cancel-button-selector">Отменить</button>
							<button type="button" class="qq-ok-button-selector">OK</button>
						</div>
					</dialog>
				</div>
			</script>

			<div id="uploader"></div>
			<script>


				var uploader = new qq.FineUploader( {
					autoUpload: true,
					element   : document.getElementById( "uploader" ),
					request   : {
						endpoint : '/user/{{ $data->category }}/message_images',
						inputName: 'photo',
						params   : {
							_token: '{{csrf_token()}}'

						}
					},
					validation: {
						allowedExtensions: [ "jpeg", "jpg", "png", "gif" ],
						sizeLimit        : 2000000 // 2 MiB
					},
					callbacks : {
						onCancel  : function( id, name ){

							document.getElementById( "img-" + id ).remove();

						},
						onComplete: function( id, name, responseJSON, xhr ){
							var newInput = document.createElement( "input" );
							newInput.type = "hidden";
							newInput.name = "image[]";
							newInput.id = "img-" + id,
								newInput.value = responseJSON.realPath;
							document.getElementById( 'user-form' ).appendChild( newInput );
							//alert(responseJSON.realPath)
						},

						onDeleteComplete: function( id, xhr, isError ){

						}
					}

				} );


			</script>

		</div>
	</div>
	@token()
	<input type="submit" value="Готово">
</form>

<script>

	$( function(){

		$( '#date' ).datetimepicker( {
			locale  : 'ru',
			format  : 'DD.MM.YYYY',
			keepOpen: false,
			maxDate : 'now'
		} );


	} );

	function initialize(){
		function h( a, b ){
			var c = b;
			a.geocode( { location: c }, function( a, b ){
				if( b === google.maps.GeocoderStatus.OK )if( a ){
					var c = $.toJSON( a );
					$.ajax( {
						type   : "POST",
						url    : "/google_geocoding_json_parse",
						data   : { geocoding_json: c, _token: "{{csrf_token()}}" },
						success: function( a ){
							var b = jQuery.parseJSON( a );
							$( "#sublocality_level_2" ).val( b.message )
						}
					} )
				} else window.alert( "Расположение не найдено!" ); else window.alert( "Geocoder failed due to: " + b )
			} )
		}

		function i( a, b ){
			a.geocode( { location: b }, function( a, b ){
				if( b === google.maps.GeocoderStatus.OK && a )for( var c = 0; c < a[ 0 ].address_components.length; c++ ){
					var d = a[ 0 ].address_components[ c ].types[ 0 ];
					if( f[ d ] ){
						var e = a[ 0 ].address_components[ c ][ f[ d ] ];
						document.getElementById( d ).value = e
					}
				}
			} )
		}

		var a = [], b = {
			zoom     : 17,
			center   : new google.maps.LatLng( 57.6262484, 39.8838331 ),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}, c  = new google.maps.Map( document.getElementById( "map" ), b ), d = new google.maps.Geocoder, f = (new google.maps.InfoWindow, {
			street_number              : "short_name",
			route                      : "long_name",
			locality                   : "long_name",
			sub_locality               : "long_name",
			administrative_area_level_1: "short_name",
			formatted_address          : "long_name",
			postal_code                : "short_name"
		}), g = 1;
		google.maps.event.addListener( c, "click", function( b ){
			if( 1 != g )return g = 1, !1;
			for( g in a )a[ g ].setMap( null );
			var e = "Этот маркер можно перетаскивать.<br>Если его нужно удалить,<br>сделайте на нём двойной клик", f = new google.maps.InfoWindow, j = new google.maps.Marker( {
				position : b.latLng,
				map      : c,
				draggable: !0,
				title    : e
			} );
			$( "#marker_position" ).val( j.position ), f.setContent( e ), f.open( c, j ), h( d, b.latLng ), i( d, b.latLng ), a.push( j ), google.maps.event.addListener( j, "click", function( a, b, d ){
				return function(){
					d.setContent( e ), d.open( c, b )
				}
			}( g, j, f ) ), google.maps.event.addListener( j, "dblclick", function(){
				j.setMap( null )
			} ), g++
		} )
	}

</script>

