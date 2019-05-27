@extends('master.base')

@section('content')

	<h1>Posts - Create <a href="{{ route("postList") }}" class="btn btn-outline-primary float-right">Back to list</a></h1>

	<div class="row">
		<div class="col-md-6">
			<form method="POST" action="{{ route("postStore") }}">

				{{ csrf_field() }}
		
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? 'is-invalid' :'' }}" value="{{ old('title') }}" >
					@error('title')
						<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>
		
		
		
				<div class="form-group">
					<label for="title">Content</label>
					<textarea name="content" id="content" cols="30" rows="10" class="form-control {{ $errors->has('content') ? 'is-invalid' :'' }}" value="{{ old('title') }}"">{{ old('content') }}</textarea>
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