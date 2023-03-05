@extends('layouts.app')

@section('content')
	<div class="container mt-5">
			<table class="table table-striped" id="data_table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Description</th>
						<th>Charge</th>
						<th>State</th>

					</tr>
				</thead>
				<tbody>
				@foreach(($user->tasks) as $task )
					<tr>
						<td>{{$task->id}}</td>
						<td>{{$task->description}} </td>
						<td>{{$task->charge}} </td>
						<td>Done</td>
					</tr>
				@endforeach
				</tbody>
			</table>
	</div>
@stop