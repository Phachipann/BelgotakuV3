@extends('template')

@section('title')
	Créer un article
@endsection

@section('content')
	<h1>Créer un article</h1>
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	<form action="{{URL::route('articles.store')}}" method="POST">
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="title">Titre de l'article</label>
			<input type="text" name="title" id="" class="form-control" value="{{old('title')}}">
		</div>

		<div class="form-group">
			<label for="content">Contenue</label>
			<textarea name="content" id="" cols="30" rows="10"  class="form-control" value="{{old('content')}}"></textarea>
		</div>
		<input type="submit" class="btn btn-success" value="Valider">
		ou
		<a href="{{URL::previous()}}">Annuler</a>
	</form>

	<script>
	    CKEDITOR.replace( 'content' );
	</script>
@endsection