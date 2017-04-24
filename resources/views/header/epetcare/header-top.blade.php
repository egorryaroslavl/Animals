<div class="header-top bg-theme-colored sm-text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="widget no-border m-0">
					<ul class="list-inline sm-text-center mt-5">
						<li>
							<a href="#" class="text-white">FAQ</a>
						</li>
						<li class="text-white">|</li>
						<li>
							<a href="#" class="text-white">Help Desk</a>
						</li>
						<li class="text-white">|</li>
						<li>
							<a href="/user" class="text-white">Войти</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-4">
				<div class="widget no-border m-0">
					<ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
						<li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
						<li><a href="#"><i class="fa fa-dribbble text-white"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin text-white"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-3">
				<div class="widget no-border m-0">
					@if($user = Sentinel::check())
						<ul class="list-inline sm-text-center mt-5">
							<li style="color:white">
							Привет,	{{$user->name}} {{--{{$user->roles()->first()->name}}--}}!  |  <form name="form_logout" id="form_logout" style="display:inline" method="post" action="/logout">
									{{csrf_field()}}
									<a style="color:white" href="#" onclick="document.getElementById('form_logout').submit()">Выйти</a>
								</form>
							</li>
						</ul>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>