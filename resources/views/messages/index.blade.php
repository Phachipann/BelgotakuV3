@extends('template')

@section('title')
	Messages privés
@endsection

@section('content')
	<a href="{{URL::route('messages.create')}}" class="btn btn-primary">Créer un nouveau MP</a>
	<div class="panel panel-primary">
		<div class="panel-heading">Liste des conversations</div>
	</div>
@endsection