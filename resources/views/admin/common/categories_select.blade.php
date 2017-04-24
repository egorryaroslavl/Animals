<?php

	$data =  \App\Model\YamzCategory::getOptions();


?>

<select name="yamz_categories" class="form-control col-md-2" id="yamz_categories">
	<option value="0"> -= Выбрать =- </option>
	@if(count($data)>0)
		@foreach( $data as $key => $item )
			<option value="{{$key}}">{{$item}}</option>
		@endforeach
	@endif
</select>