@extends('template')

@section('title')
	Editer un message
@endsection

@section('content')
	<form action="{{URL::route('forum.topic.edit.post', [$topic, $reply->id])}}" method="POST">
		{!! csrf_field() !!}
		<textarea name="content" id="" cols="30" rows="10" class="form-control">{!!$reply->content!!}</textarea>
		<input type="submit" value="Valider" class="btn btn-success">
		ou
		<a href="{{URL::previous()}}">Annuler</a>
	</form>

	<script>
		CKEDITOR.replace( 'content' );
	</script>
@endsection