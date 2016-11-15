<!DOCTYPE html>
<html>
<head>
	<title>Authentication System</title>
</head>
<body>

	@if (Session::has('global'))
		{{ Session::get('global') }}
	@endif

	@include('layouts.navigation')
	@yield('contents')
</body>
</html>