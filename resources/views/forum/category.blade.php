@extends('template')

@section('title')
	{{$forum->name}}
@endsection

@section('content')
	<h1>{{$forum->name}}</h1>
	<a href="{{$forum->slug}}/create" class="btn btn-primary">Commencer un sujet</a>
	@include('forum.subForum')
	@include('forum.topics')
@endsection