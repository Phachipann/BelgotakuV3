@extends('template')

@section('title')
	Belgotaku - la première communauté otaku et manga de Belgique
@endsection

@section('content')
	<!-- Test -->
	<textarea class="form-control" rows="12" name="editor1" onclick="show()"></textarea>
        <script>
        	function show(){
            	CKEDITOR.replace( 'editor1' );
            }
        </script>
@endsection