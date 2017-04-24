<!DOCTYPE html>
@include('head.epetcare.head')
<body>
<div id="wrapper">
@include('header.epetcare.header')
<!-- Start main-content -->
	<div class="main-content">

		@widget('PageTitle')
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="sidebar sidebar-left mt-sm-30">
							<div class="widget">
								<h5 class="widget-title line-bottom">Подать объявление в раздел...</h5>
								@include('header.epetcare.user_private_menu')
							</div>

						</div>
					</div>
					<div class="col-md-9">
						@yield('content')
					</div>
				</div>
				<h5 class="mt-60"></h5>


			</div>
		</section>

	</div>
	<!-- end main-content -->
	@include('footer.epetcare.footer')
</div>
<!-- end wrapper -->
@include('scripts_epetcate')
</body>
</html>