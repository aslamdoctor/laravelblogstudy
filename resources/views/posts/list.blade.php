@extends('master.base')

@section('content')

	<h1>Posts <a href="{{ route("postCreate") }}" class="btn btn-outline-success float-right">Add New</a></h1>
	

	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif

	@if($posts)

	<table class="table">
		<thead>
			<tr>
			<th scope="col">Title</th>
			<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($posts as $post)
				<tr>
					<td>{{ $post->title }}</td>
					<td>
						<a href="{{ route('postEdit', $post->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>

						<a href="#" class="delete btn btn-sm btn-outline-danger" data-id="{{ $post->id }}" data-route="{{ route('postDelete', $post->id) }}">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ $posts->links() }}

	<form method="POST" id="frmDelete" id="frmDelete" action="">
		@csrf
		@method('DELETE')
	</form>

	@endif
	
@endsection


@section('scripts')
<script>
	$(document).ready(function () {
		$("a.delete").click(function (e) { 
			e.preventDefault();
			if(confirm("Are you sure?") === true){
				var delete_route = $(this).data('route')
				$("#frmDelete").attr('action', delete_route);
				$("#frmDelete").submit();
			}
		});
	});
</script>
@endsection