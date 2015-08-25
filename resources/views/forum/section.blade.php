@extends('template')

@section('title')
	{{$section->name}}
@endsection

@section('content')
	<h1>{{$section->name}}</h1>
	<div>
		<ul>
			@foreach($section->categories as $category)
				<li><a href="/forum/{{$section->slug}}/{{$category->slug}}">{{$category->name}}</a></li>
			@endforeach
		</ul>	
	</div>
@endsection