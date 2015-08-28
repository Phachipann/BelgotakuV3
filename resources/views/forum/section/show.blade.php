@extends('template')

@section('title')
	{{$forum->name}}
@endsection

@section('content')
	<ol class="breadcrumb">
		<li><a href="{{URL::route('forum.index')}}">Forum</a></li>
		@foreach($breadcrumbs as $breadcrumb)
			<li><a href="{{URL::route('forum.section.show', $breadcrumb->slug)}}">{{$breadcrumb->name}}</a></li>
		@endforeach
		<li class="active">{{$forum->name}}</li>
	</ol>
	<h1>{{$forum->name}}</h1>
	<h2>Sous-forum</h2>
	@include('forum.templates.subForum')
	@include('forum.templates.topics')
@endsection