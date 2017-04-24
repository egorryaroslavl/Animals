<html lang="en">
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<meta charset="UTF-8"/>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<meta name="author" content="egorr"/>
	<meta name="csrf-token" id="csrf-token" content="{{{ csrf_token() }}}">
	<title>AnimalsCare</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
	      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- Favicon and Touch Icons -->
	<link href="/epetcare/images/favicon.png" rel="shortcut icon" type="image/png">
	<link href="/epetcare/images/apple-touch-icon.png" rel="apple-touch-icon">
	<link href="/epetcare/images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
	<link href="/epetcare/images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
	<link href="/epetcare/images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

	<!-- Stylesheet -->
	<link href="/epetcare/css/bootstrap.min.css" rel="stylesheet">
	<link href="/epetcare/css/jquery-ui.min.css" rel="stylesheet">
	<link href="/epetcare/css/animate.css" rel="stylesheet">
	<link href="/epetcare/css/css-plugin-collections.css" rel="stylesheet"/>
	<!-- CSS | menuzord megamenu skins -->
	<link href="/epetcare/css/menuzord-skins/menuzord-strip.css" rel="stylesheet"/>
	<!-- CSS | Main style file -->
	<link href="/epetcare/css/style-main.css" rel="stylesheet">

	<!-- CSS | Theme Color -->
	<link href="/epetcare/css/colors/theme-skin-blue-gary.css" rel="stylesheet">
{{--	<!-- CSS | Preloader Styles -->
	<link href="/epetcare/css/preloader.css" rel="stylesheet" type="text/css">--}}
<!-- CSS | Custom Margin Padding Collection -->
	<link href="/epetcare/css/custom-bootstrap-margin-padding.css" rel="stylesheet">
	<!-- CSS | Responsive media queries -->
	<link href="/epetcare/css/responsive.css" rel="stylesheet" type="text/css">
	<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->

@if($_SERVER['REQUEST_URI'] == '' || $_SERVER['REQUEST_URI'] == '/')
	<!-- Revolution Slider 5.x CSS settings -->
		<link href="/epetcare/js/revolution-slider/css/settings.css" rel="stylesheet"/>
		<link href="/epetcare/js/revolution-slider/css/layers.css" rel="stylesheet"/>
		<link href="/epetcare/js/revolution-slider/css/navigation.css" rel="stylesheet"/>
	@endif
		<link href="/epetcare/css/common.css" rel="stylesheet"/>
	<!-- external javascripts -->
		<script src="/epetcare/js/jquery-2.2.4.min.js"></script>
		<script src="/epetcare/js/jquery-ui.min.js"></script>
		<script src="/epetcare/js/bootstrap.min.js"></script>
	<!-- JS | jquery plugin collection for this theme -->
		<script src="/epetcare/js/jquery-plugin-collection.js"></script>
	<!-- Revolution Slider 5.x SCRIPTS -->
		<script src="/epetcare/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
		<script src="/epetcare/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>