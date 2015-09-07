@extends('template')

@section('title')
	Messages privés
@endsection

@section('content')
	<a href="{{URL::route('messages.create')}}" class="btn btn-primary">Créer un nouveau MP</a>
	<div class="panel panel-primary">
		<div class="panel-heading">Liste des conversations</div>
		<table class="table">
			@foreach($messages as $message)
				<tr>
					<td class="col-md-1">
						<span class="glyphicon glyphicon-comment"></span>
					</td>

					<td class="col-md-6">
						<a href="{{URL::route('messages.show', $message->pm->slug)}}">{{$message->pm->subject}}</a>
						<br>
						Débuté par {{$message->pm->user->name}}
					</td>

					<td class="col-md-2">
						{{$message->pm->replies->count()}} réponses
					</td>

					<td class="col-md-3">
						{{$message->pm->last_user}}
					</td>
				</tr>
			@endforeach
		</table>
	</div>
@endsection