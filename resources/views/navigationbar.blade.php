<!-- Navigation bar -->
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
		    		<li><a href="{{URL::route('forum.index')}}">Forum</a></li>

		    		<!-- Section articles -->
		    		<li class="dropdown">
		    			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Articles <span class="caret"></span></a>
          					<ul class="dropdown-menu">
          						<li><a href="{{URL::route('articles.index')}}">Ecrire un nouvel article</a></li>
								<li role="separator" class="divider"></li>
          						<li><a href="#">Mangas</a></li>
								<li><a href="#">Animes</a></li>
								<li><a href="#">Films</a></li>
								<li><a href="#">OAV</a></li>
								<li><a href="#">Courts-métrages</a></li>
							</ul>
		    		</li>

		    		<li><a href="{{URL::route('events')}}">Evènements</a></li>
		    		<li><a href="{{URL::route('contact')}}">Contact</a></li>
		    		<li><a href="{{URL::route('about')}}">A propos</a></li>
		    	</ul>

		    	<!-- Moteur de recherche -->
		    	
				<form class="navbar-form navbar-left" role="search">
			        <div class="form-group">
			        	<input type="text" class="form-control" placeholder="Recherche" name="search">
			        </div>
			        <a href="search"><span class="glyphicon glyphicon-search"></span></a>
			    </form>

			    
		    	<ul class="nav navbar-nav navbar-right">
		    		@if(Auth::check())
		    			<!-- Affiche si l'utilisateur est connecté -->
		    			<li><a href="messages"><span class="glyphicon glyphicon-envelope"></span></a></li>
		    			<li><a href="notifies"><span class="glyphicon glyphicon-bell"></span></a></li>
		    			<li><p class="navbar-text">Bienvenue <a href="{{URL::route('profile.index')}}">{{Auth::user()->name}}</a></p></li>
		    			<li><a href="{{URL::route('logout')}}">Déconnexion</a></li>
		    		@else
		    			<!-- Affiche si l'utilisateur n'est pas connecté -->
		    			<li><a href="{{URL::route('login')}}">Connexion</a></li>
		    			<li><a href="{{URL::route('register')}}">Inscription</a></li>	
		    		@endif
		    	</ul>
		    </div>
		</div>

	</header>