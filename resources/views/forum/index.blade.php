@extends('template')

@section('title')
	Forum Belgotaku
@endsection

@section('content')
	<h1>Forum page</h1>
	<div class="section">
		@foreach($forums as $forum)
			<h2><a href="forum/section/{{$forum->slug}}">{{$forum->name}}</a></h2>
			@include('forum.subForum')
		@endforeach
	</div>
@endsection