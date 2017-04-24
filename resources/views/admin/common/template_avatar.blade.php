<div class="files">
	<div id="template">
		<button data-dz-remove class="btn btn-danger btn-xs delete" style="position: absolute;top: 5px;right: 5px">
			<i class="glyphicon glyphicon-trash"></i></button>
		<span class="preview">
				<img src="/icons/{{$data->profile()->first()->icon}}" height="200" width="200" data-dz-thumbnail/>
			</span>
		<div>
			{{--<p class="name" data-dz-name></p>--}}
			<strong class="error text-danger" data-dz-errormessage></strong>
		</div>
		<div>
		</div>
	</div>
</div>