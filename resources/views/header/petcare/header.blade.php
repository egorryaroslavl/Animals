<!-- Header -->
<header class="header-main">
	@include('header.petcare.top_header')
	@include('header.petcare.logo_block')

	<nav class="navbar ow-navigation">
		<div class="container">
			<div class="row">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					        aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="navbar-brand logo-block">
						<a href="/">
							<img src="/petcare/images/logo.png" alt="Logo"/>
						</a>
					</div>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="/">Главная</a></li>
						<li><a href="/about">О нас</a></li>
						<li><a href="/services">Services</a></li>
						<li class="dropdown">
							<a href="shop.html" title="product list" class="dropdown-toggle" role="button"
							   aria-haspopup="true" aria-expanded="false">Shop</a>
							<i class="ddl-switch fa fa-angle-down"></i>
							<ul class="dropdown-menu">
								<li><a href="shop-pets.html">Pets List</a></li>
								<li><a href="shop-details.html">Product Details</a></li>
								<li><a href="checkout.html">Place Order</a></li>
								<li><a href="shop-cart.html">My Cart</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="/#" title="Pages" class="dropdown-toggle" role="button" aria-haspopup="true"
							   aria-expanded="false">Pages</a>
							<i class="ddl-switch fa fa-angle-down"></i>
							<ul class="dropdown-menu">
								<li><a href="error.html">Error</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="/articles" title="Статьи" class="dropdown-toggle" role="button" aria-haspopup="true"
							   aria-expanded="false">Статьи</a>
							<i class="ddl-switch fa fa-angle-down"></i>
							<ul class="dropdown-menu">
								<li><a href="single-blog.html">Single Blog</a></li>
							</ul>
						</li>
						<li><a href="/contact">Контакт</a></li>
					</ul>
				</div>
				<a href="/register/user">Регистрация</a>
			</div>
		</div>
	</nav>
</header><!-- Header /- -->