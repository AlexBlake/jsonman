@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<a href="{{ action('TemplateController@create') }}">Create New Template</a>
        	<table class="table table-striped">
        		<thead>
        			<tr>
        				<th>Template</th>
        				<th>Description</th>
        				<th>Created/Updated</th>
        				<th>Action</th>
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($templates as $template)
        				<tr>
        					<td>{{ $template->title }}</td>
        					<td>{{ $template->description }}</td>
        					<td>{{ $template->created_at }} / {{ $template->updated_at }}</td>
        					<td><a href="{{ action('TemplateController@edit', [ 'id' => $template->id ]) }}">Edit</a></td>
        				</tr>
        			@endforeach
        		</tbody>
        	</table>
        	<div class="text-center">
        		{{ $templates->links() }}
        	</div>
    	</div>
    </div>
</div>
@endsection