@extends('template')

@section('title')
	Incription à Belgotaku
@endsection

@section('content')
	<h1>Rejoindre notre communauté</h1>

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<form method="POST" action="register">
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="name">Nom d'utilisateur <span class="required">*</span></label>
			<input type="text" name="name" id="" class="form-control" value="{{old('name')}}">
		</div>

		<div class="form-group">
			<label for="email">Adresse de courrier <span class="required">*</span></label>
			<input type="email" name="email" id="" class="form-control" value="{{old('email')}}">
		</div>

		<div class="form-group">
			<label for="password">Mot de passe <span class="required">*</span></label>
			<input type="password" name="password" id="" class="form-control">
		</div>

		<div class="form-group">
			<label for="password">Confirmer mot de passe <span class="required">*</span></label>
			<input type="password" name="password_confirmation" id="" class="form-control">
		</div>

		<button type="submit" class="btn btn-primary">Créer un compte</button>
	</form>
@endsection