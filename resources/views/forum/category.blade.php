@extends('template')

@section('title')
	{{$category->name}}
@endsection

@section('content')
	<h1>{{$category->name}}</h1>
@endsection