@extends('template')

@section('title')
	{{$topic->subject}}
@endsection

@section('content')
	<ol class="breadcrumb">
		<li><a href="{{URL::route('forum.index')}}">Forum</a></li>
		@foreach($breadcrumbs as $breadcrumb)
			<li><a href="{{URL::route('forum.section.show', $breadcrumb->slug)}}">{{$breadcrumb->name}}</a></li>
		@endforeach
		<li class="active">{{$topic->subject}}</li>
	</ol>

	<h1>{{$topic->subject}}</h1>
	<div class="panel panel-primary">
		<div class="panel-heading">Il y a {{$topic->replies->count()}} réponses</div>
			<div class="panel panel-info">
			
			@foreach($topic->replies as $reply)		
				<div class="panel-heading">{{$reply->user->name}}</div>
				<table class="table">
					<tr>
						<td class="col-md-2">
							{{$reply->created_at}}
						</td>

						<td class="col-md-10">
							{!!$reply->content!!}
						</td>
					</tr>
				</table>
			@endforeach
			
		</div>
	</div>
	<br>
	@if(Auth::check())
		@include('forum.templates.ckeditor')
	@endif
@endsection