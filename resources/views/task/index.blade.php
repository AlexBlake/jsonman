@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<a href="{{ action('TaskController@create') }}">Create New Task</a>
        	<table class="table table-striped">
        		<thead>
        			<tr>
        				<th>Task</th>
        				<th>Description</th>
        				<th>Created/Updated</th>
        				<th>Action</th>
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($tasks as $task)
        				<tr>
        					<td>{{ $task->title }}</td>
        					<td>{{ $task->description }}</td>
        					<td>{{ $task->created_at }} / {{ $task->updated_at }}</td>
        					<td><a href="{{ action('TaskController@edit', [ 'id' => $task->id ]) }}">Edit</a></td>
        				</tr>
        			@endforeach
        		</tbody>
        	</table>
        	<div class="text-center">
        		{{ $tasks->links() }}
        	</div>
    	</div>
    </div>
</div>
@endsection