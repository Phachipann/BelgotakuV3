@extends('template')

@section('title')
	Belgotaku - la première communauté otaku et manga de Belgique
@endsection

@section('content')
	<textarea name="editor1" onclick="show()"></textarea>
        <script>
        	function show(){
            	CKEDITOR.replace( 'editor1' );
            }
        </script>
@endsection