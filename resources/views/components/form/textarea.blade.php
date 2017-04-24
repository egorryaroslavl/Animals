<div class="form-group">
	{{ Form::label( $name , $label , null, ['class' => 'control-label']) }}
	{{ Form::textarea( $name, $value, array_merge([ 'class' => 'form-control','id'=>$name,'placeholder'=> $label ], $attributes)) }}
</div>