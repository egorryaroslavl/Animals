<!DOCTYPE html>
@include('head.petcare.head')
<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
{{--@include('header.loader')--}}
<a id="top"></a>
<!-- Main Container -->
<div class="main-container">
	@include('header.petcare.header')
	@yield('content')
	@include('footer.petcare.footer')
</div><!-- Main Container -->
@include('scripts_petcare')
</body>
</html>