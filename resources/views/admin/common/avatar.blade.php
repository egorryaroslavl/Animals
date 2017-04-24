<table style="width:200px">
	<tr>
		<td id="previews" class="no-avatar">
			@if(isset($data->profile()->first()->icon  ))
				<span class="preview current">
															<img data-dz-thumbnail=""
															     src="/icons/{{ \App\Http\Controllers\ImageController::thumbnail_large($data->profile()->first()->icon ) }}"
															     width="200" alt=""></span>
			@endif
		</td>
	</tr>
	<tr>
		<td class="fileinput-button"
		    style="height: 50px;background: #e1e9ff;color:#9f9f9f;cursor: pointer;text-align: center;padding: 5px">
			<i class="fa fa-upload" aria-hidden="true"></i> Бросьте файл
			                                                изображения сюда
			                                                или кликните
			                                                здесь
		</td>
	</tr>

</table>
<link
	href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css"
	rel="stylesheet">
<script
	src="/assets/js/dropzone.js"></script>
<script>

	//var previewNode = document.querySelector( "#template" );
	//	previewNode.id = "";
	//var previewTemplate = previewNode.parentNode.innerHTML;
	//previewNode.parentNode.removeChild( previewNode );
	var paramsData = {

		table : '{{$data->table}}',
		id    : '{{$data->id,"0"}}',
		_token: '<?php echo csrf_token() ?>'
	};
	Dropzone.autoDiscover = false;
	var imgDropzone = new Dropzone( document.body, {
		url              : "/iconsave",
		params           : paramsData,
		paramName        : "photo",
		uploadMultiple   : false,
		maxFiles         : 1,
		thumbnailWidth   : 200,
		thumbnailHeight  : 200,
		parallelUploads  : 1,
		//previewTemplate  : previewTemplate,
		previewsContainer: "#previews",
		clickable        : ".fileinput-button",
		init             : function(){
			this.on( "success", function( file, msg ){
				$( ".current" ).slideUp( "slow", function(){
					$( ".current" ).remove();
				} );
				var res = jQuery.parseJSON( msg );


				if( res.error == 'ok' ){

					$( "input[name='icon']" ).remove();
					$( 'form#data-form' ).append( '<input type="hidden" name="icon" id="icon" value="' + res.message + '" />' );

				}
			} )
		}

	} );

	imgDropzone.on( "addedfile", function( file ){
		if( this.files.length > 1 ){
			this.removeFile( this.files[ 0 ] );
		}

	} );
</script>
<style>
	.dz-success-mark, .dz-error-mark, .dz-details {
		display:    none;
		visibility: hidden;
		}
</style>