@extends('template')

@section('title')
	{{$user->name}} - Affichage d'un profil
@endsection

@section('content')
	<div class="row">
		<div class="avatar col-md-2">
			
		</div>
		<div class="profile col-md-10">
			<h1>{{$user->name}}</h1>
			inscrit(e) le {{$user->created_at->format('d/m/Y')}}
		</div>
	</div>
	
	<br>
	
	<div class="row">
		<ul class="nav nav-tabs nav-stacked col-md-2">
			<li role="navigation"><a href="#">Aperçu</a></li>
			<li role="navigation"><a href="#subjects">Sujets</a></li>
			<li role="navigation"><a href="#messages">Messages</a></li>
			<li role="navigation"><a href="#badges">Badges</a></li>
		</ul>

		<div ng-view class="col-md-10">
			
		</div>
	</div>
@endsection