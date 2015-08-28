<div class="topics">
	<h2>Topics</h2>
	<table class="table">
		@foreach($topics as $topic)
		<tr>
			<td class="unread">
				<span class="glyphicon glyphicon-comment"></span>
			</td>

			<td class="content">
				<h4><a href="{{URL::current()}}/{{$topic->slug}}">{{$topic->subject}}</a></h4>
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