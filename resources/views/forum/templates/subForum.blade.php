<!-- Affiche les sous forums (template) -->
<div class="sub-forum">
	<table>
		@foreach($forum->subForums as $subForum)
			<tr class="category">
				<td class="unread col-md-1">
					<span class="glyphicon glyphicon-comment"></span>
				</td>
					
				<td class="col-md-7">
					<h4><a href="{{URL::route('forum.section.show', $subForum->slug)}}">{{$subForum->name}}</a></h4>
					<ul class="list-inline">
						@foreach($subForum->subForums as $subSubForum)
							<li>
								<h5>
									<a href="{{URL::route('forum.section.show', $subSubForum->slug)}}">{{$subSubForum->name}}</a>
								</h5>
							</li>,
						@endforeach
					</ul>
				</td>
				
				<td class="lastpost col-md-4">
					Dernier message
				</td>
			</tr>
		@endforeach
	</table>
</div>