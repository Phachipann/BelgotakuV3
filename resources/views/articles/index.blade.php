@extends('template')

@section('title')
	Articles
@endsection

@section('content')
	@if(Auth::check())
		<a href="{{URL::route('articles.create')}}" class="btn btn-primary">Ajouter un nouvel article</a>
	@else
		Vous devez vous connecter pour ajouter un nouvel article. <a href="{{URL::route('login')}}">Connectez-vous !</a>
	@endif

	<h1>Article(s) en attente</h1>
	@foreach($articles as $article)
		<h2><a href="articles/{{$article->slug}}">{{$article->title}}</a></h2>
		{!!$article->content!!}
	@endforeach
@endsection