<!DOCTYPE html>
<html lang="en">
	<head>
        @section('head')
		<title>{{isset($title) ? $title : 'OQueComer' }}</title>
		<meta charset="UTF-8">
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        @show
	</head>
	<body>
		@yield('content', 'Default Content')
	</body>
</html>