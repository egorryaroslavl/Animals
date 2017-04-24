<h2>{{$breadcrumbs['title'] or 'Административная часть'}}</h2>
<ol class="breadcrumb">
	<li>
		<a href="/admin">Главная</a>
	</li>
	@if(isset($breadcrumbs['items']) && count($breadcrumbs['items'])>0)
		@foreach( $breadcrumbs['items'] as $url => $title )
			<li>
				<a class="active" href="{{$url}}">{{$title}}</a>
			</li>
		@endforeach
	@endif
</ol>