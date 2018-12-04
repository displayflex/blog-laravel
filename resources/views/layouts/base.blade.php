<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<title>{{ $title }}</title>
		<link rel="stylesheet" href="/assets/css/main.css">
		@yield('head-styles')
		@yield('head-scripts')
	</head>
	<body class="right-sidebar is-preload">
		<div id="page-wrapper">

			@yield('header')

			@yield('content')

			@yield('footer')

		</div>

		@yield('bottom-scripts')
	</body>
</html>
