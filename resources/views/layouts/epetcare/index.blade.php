<!DOCTYPE html>
@include('head.epetcare.head')
<body>
<div id="wrapper">
@include('header.epetcare.header')
<!-- Start main-content -->
	<div class="main-content">
@yield('content')
	</div>
	<!-- end main-content -->
	@include('footer.epetcare.footer')
</div>
<!-- end wrapper -->
@include('scripts_epetcate')
</body>
</html>