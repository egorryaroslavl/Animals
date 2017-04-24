<?php
	$adminId = Sentinel::getUser()->id;
	$admin   = \App\User::whereId( $adminId );
	$src     = '/inspinia/img/administrator48x48.png';
	$icon    = $admin->profile()->first()->icon;
	if( isset($icon) && file_exists( public_path( 'icons/' ) . $icon ) ){

		$src = '/icons/' . \App\Http\Controllers\ImageController::thumbnail_small( $icon );

	}
?>

<div class="dropdown profile-element"> <span>

                            <img alt="image" class="img-circle" src="{{$src or '/inspinia/img/administrator48x48.png'}}"/>
                             </span>
	<a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"
                                                                                    style="text-transform:uppercase">{{Sentinel::getUser()->name}} </strong>
                             </span> <span class="text-muted text-xs block"> {{Sentinel::getUser()->roles()->first()->slug}}
		                            <b class="caret"></b></span> </span> </a>
	<ul class="dropdown-menu animated fadeInRight m-t-xs">
		<li><a href="/admin/user/{{$adminId}}">Профиль</a></li>
		<li><a href="/">На сайт</a></li>
		<li><form name="form_logout" id="form_logout0" method="post" action="/logout">
				{{csrf_field()}}
				<a  style="color: #ff2222;padding: 0 23px" href="#" onclick="document.getElementById('form_logout0').submit()">Выйти</a>
			</form></li>
		<li class="divider"></li>

	</ul>

</div>