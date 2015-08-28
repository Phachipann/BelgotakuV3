@extends('template')

@section('title')
	Connexion
@endsection

@section('content')
	<h1>Connexion</h1>
	
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<form action="login" method="POST">
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="name">Nom d'utilisateur</label>
			<input type="text" name="name" id="" class="form-control" value="{{old('name')}}">
		</div>

		<div class="form-group">
			<label for="password">Mot de passe</label>
			<input type="password" name="password" id="" class="form-control">
		</div>
		
		<div class="form-group">
			<input type="checkbox" name="remember" id="">Se souvenir de moi
		</div>
		<div class="form-group">
			<input type="submit" value="Connexion" class="btn btn-primary">
		</div>
	</form>
@endsection