<!DOCTYPE html>
<!--[if lt IE 9]><html class="no-js lt-ie9" id="ng-app" ng-app="app"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" id="ng-app" ng-app="app"><!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		{{-- Document title --}}
		<title>{{ $doc_title() }}</title>

		{{-- Metadata --}}
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="White Lion Interactive">
		<link rel="author" href="http://wlion.com">
		@yield('metadata')

		{{-- Icons --}}
		<link rel="shortcut icon" href="{{ asset_path('img/favicon.ico') }}">
		<link rel="apple-touch-icon" sizes="57x57" href="{{ asset_path('img/iphone_apple_touch_57x57.png') }}">
		<link rel="apple-touch-icon" sizes="72x72" href="{{ asset_path('img/ipad_72x72.png') }}">
		<link rel="apple-touch-icon" sizes="114x114" href="{{ asset_path('img/iphone4_retina_114x114.png') }}">
		<link rel="apple-touch-icon" sizes="144x144" href="{{ asset_path('img/ipad3_retina_144x144.png') }}">

		{{-- Fonts --}}
		@section('fonts')
			{{-- <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'> --}}
		@show

		{{-- CSS --}}
		@section('css')
			<link rel="stylesheet" href="{{ asset_version('css/admin/global.css') }}">
		@show

		{{-- Head JS --}}
		@section('head-js')
			<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
			<script>window.Modernizr || document.write('<script src="{{ asset_version('vendor/modernizr.js') }}">\x3C/script>');</script>
		@show

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="{{ $body_class() }}" ng-controller="BaseController">
		{{-- Template --}}
		@yield('template')

		{{-- Growl messages --}}
		<ul class="growls">
			@foreach ($growls() as $growl)
				<li class="growl {{ $growl['type'] }}">
					<div class="growl-title">
						{{ $growl['title'] }}
					</div>
					<div class="growl-message">
						{{ $growl['message'] }}
					</div>
				</li>
			@endforeach
			<growls></growls>
		</ul>

		{{-- Footer JS --}}
		@section('footer-js')
			<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
			@section('jquery-plugins')
				<script src="http://charuru.github.io/lionbars/js/jquery.lionbars.0.3.js"></script>
			@show
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
			<script>typeof $().modal === 'function' || document.write('<script src="{{ asset_version('vendor/bootstrap.js') }}">\x3C/script>')</script>
			<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
			<script>window.angular || document.write('<script src="{{ asset_version('vendor/angular.js') }}">\x3C/script>')</script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
			<script>window.moment || document.write('<script src="{{ asset_version('vendor/moment.js') }}">\x3C/script>')</script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js"></script>
			<script>window._ || document.write('<script src="{{ asset_version('vendor/lodash.js') }}">\x3C/script>')</script>
			<script src="{{ asset_path('packages/ckeditor/ckeditor.js') }}"></script>
			<script src="{{ asset_version('js/admin/global.js') }}"></script>
			<script src="{{ asset_version('js/admin/app.js') }}"></script>
		@show
	</body>
</html>
