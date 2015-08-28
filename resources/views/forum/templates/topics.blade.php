<div class="topics">
	@if(Auth::check())
		<a href="{{URL::route('forum.section.create.get', $forum->slug)}}" class="btn btn-primary">Commencer un sujet</a>
	@endif
	<table class="table">
		@foreach($forum->topics as $topic)
		<tr>
			<td class="unread">
				<span class="glyphicon glyphicon-comment"></span>
			</td>

			<td class="content">
				<h4><a href="{{URL::route('forum.topic.show', $topic->slug)}}">{{$topic->subject}}</a></h4>
			</td>

			<td class="preview">
				
			</td>

			<td class="statistics">
				<ul class="list-unstyled">
					<li>{{count($topic->replies)}} réponses</li>
					<li>vues</li>
				</ul>
			</td>

			<td class="lastpost">
				Dernier message
			</td>
		</tr>
		@endforeach
	</table>
</div>