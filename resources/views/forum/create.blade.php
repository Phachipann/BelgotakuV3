@extends('template')

@section('title')
	Nouveau sujet
@endsection

@section('content')
	<h1>Nouveau sujet</h1>
	<form action="create" method="POST">
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="name">Le titre du sujet</label>
			<input type="text" name="subject" id="" class="form-control">
		</div>

		<div class="form-group">
			<textarea name="content" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<input type="submit" value="Envoyer ce nouveau sujet"> ou
			<a href="{{URL::previous()}}">Annuler</a>
		</div>
	</form>

	<script>
		CKEDITOR.replace( 'content' );
	</script>
@endsection