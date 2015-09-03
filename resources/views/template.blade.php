<!DOCTYPE html>
<html lang="en" ng-app="belgotaku">
<head>
	<!-- Script-->
	<meta charset="UTF-8">
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.4/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.4/angular-route.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.4/angular-sanitize.min.js"></script>
	<script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/forum.css">
	<script src="js/app.js"></script>
	<title>@yield('title')</title>
</head>
<body>
	
	@include('navigationbar')

	<div class="container-fluid">
		@yield('content')
	</div>
</body>
</html>