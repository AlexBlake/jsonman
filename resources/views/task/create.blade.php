@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<form method="POST" action="{{ action('TaskController@store') }}">
        		<input type="hidden" name="token" value="{{ csrf_token() }}">
        		
        		<div class="form-group col-md-12">
        			<label class="form-label">Title</label>
        			<input class="form-control" type="text" name="title" value="">
        		</div>
        		<div class="form-group col-md-12">
        			<label class="form-label">Path</label>
        			<input class="form-control" type="text" name="path" value="">
        		</div>
        		<div class="form-group col-md-12">
        			<label class="form-label">Description</label>
        			<textarea class="form-control" name="description"></textarea>
        		</div>
        		<div class="form-group col-md-12">
        			<label class="form-label">Template</label>
        			<select class="form-control" name="template_id">
        				@foreach($templates as $template)
        					<option value="{{ $template->id }}">{{ $template->title }}</option>
        				@endforeach
        			</select>
        		</div>
        		<div class="form-group col-md-12">
        			<input class="btn btn-primary" type="submit">
        		</div>
        	</form>
        </div>
    </div>
</div>
@endsection