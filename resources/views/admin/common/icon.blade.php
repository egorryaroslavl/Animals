{{--{{dd($data)}}--}}
<div
        class="dropzone-preview"
        id="icon-preview"
        data-table="{{$data->table}}"
        data-id="{{$data->id}}"
        data-icon="{{$data->icon}}"></div>
<div id="icon-place" class="dropzone"></div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
<script>
    var paramsData = {

        table : '{{$data->table}}',
        id    : '{{$data->id,"0"}}',
        _token: '<?php echo csrf_token() ?>'
    };

    Dropzone.autoDiscover = false;
    var imgDropzone = new Dropzone( "div#icon-place",
            {
                url               : "/iconsave",
                params            : paramsData,
                uploadMultiple    : false,
                addRemoveLinks    : true,
                maxFiles          : 1,
                thumbnailWidth    : 200,
                thumbnailHeight   : 200,
                paramName         : "photo",
                dictDefaultMessage: "Бросьте изображение сюда.<br>Или кликните здесь.",
                dictRemoveFile    : 'Удалить',
                init              : function(){
                    this.on( "success", function( file, msg ){
                        var res = jQuery.parseJSON( msg );
                        if( res.error == 'ok' ){
                            $( "div.dz-image" ).each( function( index, element ){
                                if( element.index > 0 ){
                                    $( element ).remove();

                                }
                            } );

                            $( "input[name='icon']" ).remove();
                            $( 'form' ).append( '<input type="hidden" name="icon" id="icon" value="' + res.message + '" />' );
                            $( ".dropzone-preview" ).css( 'opacity', '.1' );

                        }
                        if( res.error == 'error' ){
                            alert( 'Загрузка изображения закончилось ошибкой!' )
                        }
                    } );

                    this.on( "removedfile", function(){
                        imgDropzone.enable();
                    } );

                }
            }
    );
    imgDropzone.on( "complete", function(){
        imgDropzone.disable();

    } );


</script>
<style>
    .dropzone {
        padding:        3px;
        text-align:     center;
        vertical-align: middle;
        }

    .dropzone-preview {
        border:          1px #6a6a6a dotted !important;
        border-bottom:   none;
        width:           224px;
        height:          150px;
        background:      transparent url('{{$data->icon}}') 50% 50% no-repeat;
        background-size: contain;
        }

    .dz-image {
        border-radius: 2px !important;
        overflow:      hidden;
        width:         200px !important;
        height:        200px !important;
        position:      relative;
        display:       block;
        z-index:       10;
        }

    .data-dz-thumbnail {
        border-radius: 3px !important;
        height:        120px;
        width:         120px;
        }

    .dz-remove {
        background:    #ff9a00;
        color:         #fff;
        padding:       2px 10px;
        border-radius: 6px;
        margin-top:    10px;
        }

    .dropzone .dz-preview {
        margin:  0px;
        padding: 0;

        }

    .dz-remove:hover {
        background:      #ff6000;
        color:           #fff;
        text-decoration: none !important;
        }
</style>