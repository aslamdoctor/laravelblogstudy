@extends('master.base')

@section('content')

	<h1>Posts - Edit <a href="{{ route("postList") }}" class="btn btn-outline-primary float-right">Back to list</a></h1>

	<div class="row">
		<div class="col-md-6">

			<form method="POST" action="{{ route("postUpdate", $post->id) }}">

				{{ csrf_field() }}
				@method('PUT')
				
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? 'is-invalid' :'' }}" value="{{ old('title', $post->title) }}">
			
					@error('title')
						<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
		
				<div class="form-group">
					<label for="title">Title</label>
					<textarea name="content" id="content" cols="30" rows="10" class="form-control {{ $errors->has('content') ? 'is-invalid' :'' }}">{{ old('content', $post->content) }}</textarea>
			
					@error('content')
						<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
		
		
				<input type="submit" value="Save" class="btn btn-primary">
		
			</form>

		</div>
	</div>
	
	
@endsection


@section('scripts')
<script>
	$(document).ready(function () {
		
	});
</script>
@endsection