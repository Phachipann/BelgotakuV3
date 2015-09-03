<form action="{{URL::route('forum.topic.post', $topic->slug)}}" class="from group" method="POST">
	{!! csrf_field() !!}
	<textarea class="form-control" rows="12" name="content" onclick="show()"></textarea>
	<input type="submit" value="Répondre">
</form>

<script>
    function show(){
       	CKEDITOR.replace( 'content' );
    }
</script>