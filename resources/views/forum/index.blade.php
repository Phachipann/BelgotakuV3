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
				<div class="panel-heading">
					<h2 class="panel-title">
						<a href="forum/section/{{$forum->slug}}">{{$forum->name}}</a>
					</h2>
				</div>
				
				@include('forum.templates.subForum')
			</div>
		@endforeach
@endsection