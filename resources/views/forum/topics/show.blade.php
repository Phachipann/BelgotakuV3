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
	<table>
		@foreach($topic->replies as $reply)
			<tr class="post row">
				<td class="left">
					<h4>{{$reply->user->name}}</h4> <br>{{$reply->created_at}}
				</td>

				<td class="right">
					{!!$reply->content!!}
				</td>
			</tr>
		@endforeach
	</table>
	<br>
	@if(Auth::check())
		@include('forum.templates.ckeditor')
	@endif
@endsection