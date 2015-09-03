@extends('template')

@section('title')
	{{$forum->name}}
@endsection

@section('content')
	<!-- breadcrumb -->
	<ol class="breadcrumb">
		<li><a href="{{URL::route('forum.index')}}">Forum</a></li>
		@foreach($breadcrumbs as $breadcrumb)
			<li><a href="{{URL::route('forum.section.show', $breadcrumb->slug)}}">{{$breadcrumb->name}}</a></li>
		@endforeach
		<li class="active">{{$forum->name}}</li>
	</ol>

	<!-- Affiche les sous forums -->
	<h1>{{$forum->name}}</h1>
	<div class="panel panel-primary">
		<div class="panel-heading">Sous-forum</div>
		@include('forum.templates.subForum')
	</div>

	<!-- Affiche les topics -->
	@include('forum.templates.topics')
@endsection