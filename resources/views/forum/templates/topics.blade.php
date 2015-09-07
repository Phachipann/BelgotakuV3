<!-- Affiche le liste de topic -->
<div class="topics">
	@if(Auth::check())
		<a href="{{URL::route('forum.section.create.topic', $forum->slug)}}" class="btn btn-primary">Commencer un sujet</a>
	@endif
	<div class="panel panel-primary">
		<div class="panel-heading">Liste de topics</div>
		<table class="table">
			@foreach($forum->topics as $topic)
				<tr>
					<td class="unread col-md-1">
						<span class="glyphicon glyphicon-comment"></span>
					</td>

					<td class="content col-md-6">
						<h4><a href="{{URL::route('forum.topic.show', $topic->slug)}}">{{$topic->subject}}</a></h4>
						Débuté par {{$topic->user->name}}, {{$topic->created_at->format('d/m/Y')}}
					</td>

					<td class="statistics col-md-2">
						<ul class="list-unstyled">
							<li>{{count($topic->replies)}} réponses</li>
							<li>{{$topic->view->views}} vues</li>
						</ul>
					</td>

					<td class="lastpost col-md-3">
						{{$topic->last_user}}
					</td>
				</tr>
			@endforeach
		</table>
	</div>
</div>