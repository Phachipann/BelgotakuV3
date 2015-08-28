<div class="sub-forum">
	<table class="table">
		@foreach($forum->subForums as $subForum)
			<tr class="category">
				<td class="unread">
					<span class="glyphicon glyphicon-comment"></span>
				</td>
					
				<td>
					<h3><a href="{{URL::route('forum.section.show', $subForum->slug)}}">{{$subForum->name}}</a></h3>
					<ul class="list-inline">
						@foreach($subForum->subForums as $subSubForum)
							<li>
								<h4>
									<a href="{{URL::route('forum.section.show', $subSubForum->slug)}}">{{$subSubForum->name}}</a>
								</h4>
							</li>,
						@endforeach
					</ul>
				</td>
				
				<td class="statistics">
					<ul class="list-unstyled">
						<li>sujets</li>
						<li>réponses</li>
					</ul>
				</td>
				
				<td class="lastpost">
					Dernier message
				</td>
			</tr>
		@endforeach
	</table>
</div>