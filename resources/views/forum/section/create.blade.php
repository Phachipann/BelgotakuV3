@extends('template')

@section('title')
	Création d'une nouvelle Section
@endsection

@section('content')
	<form action="create" method="POST">
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="parent">Parent</label>
			<select name="parent" id="" class="form-control">
				
			</select>
		</div>
		<div class="form-group">
			<input type="submit" value="Valider" class="btn btn-success">
		</div>
	</form>
@endsection