@extends('template')

@section('title')
	{{$topic->subject}}
@endsection

@section('content')
	<h1>{{$topic->subject}}</h1>
	@foreach($topic->replies as $reply)
		<div class="replies row">
			<div class="avatar col-sm-2">
				<h2>{{$reply->user->name}}</h2>
			</div>

			<div class="content col-sm-10">
				{!!$reply->content!!}
			</div>
		</div>
	@endforeach
	@include('forum.templates.ckeditor')
@endsection