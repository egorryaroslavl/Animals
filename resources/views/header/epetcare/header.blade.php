<!-- Header -->
<header class="header">
@include('header.epetcare.header-top')
	<div class="header-nav">
		<div class="header-nav-wrapper navbar-scrolltofixed bg-white">
			<div class="container">
				<nav id="menuzord-right" class="menuzord green no-bg" style="width: 100%">
					<a class="menuzord-brand pull-left flip" href="javascript:void(0)"><img
							src="/epetcare/images/logo-wide.png" alt=""></a>
					<ul class="menuzord-menu">
						<li class="active"><a href="/">Главная</a></li>
						<li><a href="#">Features</a></li>
						<li><a href="#">Pages</a></li>
						<li><a href="#">Gallery</a></li>
						@if(!Sentinel::check())
						<li><a href="/register">Регистрация</a></li>
						@endif
						<li><a href="#">Contact</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</header>