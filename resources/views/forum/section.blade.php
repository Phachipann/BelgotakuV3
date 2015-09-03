@extends('template')

@section('title')
	{{$forum->name}}
@endsection

@section('content')
	<!-- Breadcrumbs -->
	<ol class="breadcrumb">
		<li><a href="{{URL::route('forum.index')}}">Forum</a></li>
		@foreach($breadcrumbs as $breadcrumb)
			<li><a href="{{URL::route('forum.section.show', $breadcrumb->slug)}}">{{$breadcrumb->name}}</a></li>
		@endforeach
		<li class="active">{{$forum->name}}</li>
	</ol>

	<!-- Affiche les sous forums -->
	<h1>{{$forum->name}}</h1>
	<h2 class="category">Sous-forum</h2>
	@include('forum.subForum')
	@include('forum.topics')
@endsection