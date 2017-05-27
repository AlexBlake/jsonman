@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<form method="POST" action="{{ action('TemplateController@store') }}">
        		<input type="hidden" name="token" value="{{ csrf_token() }}">
        		<input type="hidden" name="json" value="">
        		
        		<div class="form-group col-md-10">
        			<label class="form-label">Title</label>
        			<input class="form-control" type="text" name="title" value="">
        		</div>
        		<div class="form-group col-md-2">
        			<label class="form-label">Title</label>
        			<input class="btn btn-primary" type="submit">
        		</div>
        		<div class="form-group col-md-12">
        			<label class="form-label">Description</label>
        			<textarea class="form-control" name="description"></textarea>
        		</div>
        	</form>
        </div>
    </div>

    <div class="row">
	    <div class="col-md-8 col-md-offset-2 well">

        	

        </div>
    </div>
</div>
@endsection