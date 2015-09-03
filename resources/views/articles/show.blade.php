@extends('template')

@section('title')
	{{$article->title}}
@endsection

@section('content')
	<div class="article">
		<h1>{{$article->title}}</h1>
		{!!$article->content!!}
	</div>
	
	<div class="comments">
		<h1>Commentaires</h1>
		@foreach($article->comments as $comment)
			<div class="comments-post">
				<h2>{{$comment->user->name}}</h2>
				{!!$comment->comment!!}
			</div>
		@endforeach
	</div>

	<form action="{{URL::route('postcomments', $article->slug)}}" method="POST">
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="comments">Commentaire</label>
			<textarea name="comment" id="" cols="30" rows="10" class="form-control"></textarea>
		</div>
		<input type="submit" value="Valider" class="btn btn-success">
	</form>
@endsection