@extends('layouts.app')

@section('content')


	<div class="container mt-5">
			<table class="table table-striped" id="data_table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Estimate</th>
						<th>Date</th>
						<th>Description</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				@foreach($user->projects as $project )
					<tr>
						<td>{{$project->id}}</td>
						<td>{{$project->estimate}} J/H</td>
                        <td>{{$project->date}}</td>
						<td>{{$project->description}}</td>
						<td>
							<a href="{{route('project.data',['id'=>$project->id])}}"><i class="bi bi-eye-fill"></i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
	
	<br>
	</div>
@stop