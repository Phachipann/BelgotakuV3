@extends('template')

@section('title')
	Forum Belgotaku
@endsection

@section('content')
	<h1>Forum page</h1>
	<a href="{{URL::route('forum.create.section')}}" class="btn btn-primary">Créer une nouvelle section</a>
		<!-- Affiche les différentes sections du forum -->
		@foreach($forums as $forum)
			<div class="panel panel-primary">
				<div class="panel-heading"><a href="forum/section/{{$forum->slug}}">{{$forum->name}}</a></div>
				@include('forum.templates.subForum')
			</div>
		@endforeach
@endsection