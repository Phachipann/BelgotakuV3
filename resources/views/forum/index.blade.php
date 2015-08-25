@extends('template')

@section('title')
	Forum Belgotaku
@endsection

@section('content')
	<h1>Forum page</h1>
	<div class="section">
		@foreach($sections as $section)
			<h2><a href="forum/{{$section->slug}}">{{$section->name}}</a></h2>
			<table>
				<tr class="categories">
					<ul>
						@foreach($section->categories as $category)
							<li><a href="forum/{{$section->slug}}/{{$category->slug}}">{{$category->name}}</a></li>
						@endforeach
					</ul>
				</tr>
			</table>
		@endforeach
	</div>
@endsection