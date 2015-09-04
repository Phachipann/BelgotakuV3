@extends('template')

@section('title')
	Créer un nouveau MP
@endsection

@section('content')
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<form action="{{URL::route('messages.store')}}" method="POST" class="horizontal-form">
		{!! csrf_field() !!}
		<div class="panel panel-primary" ng-controller="UsersController">
			<div class="panel-heading">Ecrire un nouveau message</div>
			<div class="panel panel-info">
				
				<div class="panel-heading">destinataires</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="name" class="col-sm-2 col-sm-offset-2">Nom du destinataire</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="" class="form-control" data-ng-model="name" list="username">
							<datalist id="username">
								<option data-ng-repeat="user in users" value="@{{user.name}}"></option>
							</datalist>
						</div>
					</div>	
				</div>

				<div class="panel-heading">messages</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="subject" class="col-sm-2 col-sm-offset-2">Sujet du message</label>
						<div class="col-sm-6">
							<input type="text" name="subject" id="" class="form-control">
						</div>
					</div>
					<br>
					<div class="form-group">
						<textarea name="content" id="" cols="30" rows="10" class="form-control" value="{{old('content')}}"></textarea>
					</div>
				</div>

				<div class="panel-footer">
					<input type="submit" value="Envoyer" class="btn btn-primary">
				</div>

			</div>
		</div>
	</form>
	<script>
		CKEDITOR.replace('content');
	</script>
@endsection