<!DOCTYPE html>
<html lang="en">
<head>
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
	<script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>
	<link rel="stylesheet" href="/css/style.css">
	<title>@yield('title')</title>
</head>
<body>
	<header class="navbar navbar-default navbar-static-top">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuBar">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="/">Belgotaku</a>
		    </div>

		    <div class="collapse navbar-collapse" id="menuBar">
		    	<ul class="nav navbar-nav">
		    		<li><a href="forum">Forum</a></li>
		    		<li><a href="articles">Articles</a></li>
		    		<li><a href="event">Evènements</a></li>
		    		<li><a href="contact">Contact</a></li>
		    		<li><a href="about">A propos</a></li>
		    	</ul>
				<form class="navbar-form navbar-left" role="search">
			        <div class="form-group">
			        	<input type="text" class="form-control" placeholder="Recherche" name="search">
			        </div>
			        <a href="search"><span class="glyphicon glyphicon-search"></span></a>
			    </form>
		    	<ul class="nav navbar-nav navbar-right">
		    		@if(Auth::check())
		    			<li><a href="messages"><span class="glyphicon glyphicon-inbox"></span></a></li>
		    			<li><a href="notifies"><span class="glyphicon glyphicon-bell"></span></a></li>
		    			<li><p class="navbar-text">Bienvenue <a href="profil">{{Auth::user()->name}}</a></p></li>
		    			<li><a href="logout">Déconnexion</a></li>
		    		@else
		    			<li><a href="login">Connexion</a></li>
		    			<li><a href="register">Inscription</a></li>	
		    		@endif
		    	</ul>
		    </div>
		</div>
	</header>
	<div class="container-fluid">
		@yield('content')
	</div>
</body>
</html>