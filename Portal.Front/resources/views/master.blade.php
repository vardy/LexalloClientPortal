<!DOCTYPE html>
<html>

<head>
	<title>@yield('title') | Client Portal</title>
</head>

<body>

	<!-- Header bar and branding goes here -->
	<ul>
		<li><a href="/">Home</a></li>
		<li><a href="/test_page">Test Page</a></li>
	</ul>


	@yield('content')
</body>

</html>