<!DOCTYPE html>
<html lang="en">

<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/todo.css') }}" rel="stylesheet">
	<link href="{{ asset('css/login.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,700&display=swap" rel="stylesheet">
	<script>
		const token = localStorage.getItem('authToken');
		const expiration = localStorage.getItem('expiresIn');
		const currentPath = window.location.pathname;
		if ((!token || !expiration || Date.now() > expiration) && currentPath !== '/user/login' && currentPath !== '/' && currentPath !== '/user/register') {
			// display error message set timeout.
			window.location.href = '/'; // Redirect to login page if token is not present
		}
	</script>
	@yield('scripts')
</head>

<body>
	@yield('content')

</body>

</html>
