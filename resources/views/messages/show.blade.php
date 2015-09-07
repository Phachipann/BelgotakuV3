@extends('template')

@section('title')
	{{$message->subject}}
@endsection

@section('content')
	<div class="col-md-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Participants</div>
			<ul class="list-group">
				@foreach($message->toUsers as $user)
					<li class="list-group-item">{{$user->name}}</li>
				@endforeach
			</ul>
		</div>
	</div>
	
	<div class="col-md-9">
		<div class="panel panel-primary">
			<div class="panel-heading">{{$message->subject}}</div>

			<div class="panel panel-info">
				@foreach($message->replies as $reply)
					<div class="panel-heading">
						{{$reply->user->name}}
					</div>
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

			<div class="panel-body">
				<form action="{{URL::route('messages.reply', $message->slug)}}" method="post">
					{!! csrf_field() !!}
					<textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
					<input type="submit" value="Valider" class="btn btn-success">
				</form>
			</div>
		</div>
	</div>
@endsection