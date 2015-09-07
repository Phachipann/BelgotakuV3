@extends('template')

@section('title')
	Nouveau sujet
@endsection

@section('content')
	<!-- Crée un nouveau topic -->
	<h1>Nouveau sujet</h1>
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	<form method="POST" action="{{URL::route('forum.section.create.topic', $section)}}">
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="name">Le titre du sujet</label>
			<input type="text" name="subject" id="" class="form-control" value="{{old('subject')}}">
		</div>

		<div class="form-group">
			<textarea name="content" class="form-control" value="{{old('content')}}"></textarea>
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