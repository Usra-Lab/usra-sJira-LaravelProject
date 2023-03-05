@extends('layouts.app')

@section('content')
<!---------------------------------------- AddProjectTasks ---------------------------------------->

<div class="modal fade" id="AddProjectTasks" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close btn-close-dark " data-bs-dismiss="modal"></button>
                    <form method="post" action="{{route('project_tasks.add',['id'=>$project->id])}}">
                        @csrf
                        <select name="TId[]" class="form-select mt-4" aria-label="Default select example" multiple >
                            @foreach ($tasks as $task) 
                                <option value="{{$task->id}}"><h3>{{$task->description}}</h3></option>
                            @endforeach
                        </select>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-secondary">AddRoles</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

<!-------------------------------------------------------------------------------->

	<div class="container mt-5">
			<div>
				<button type="button" class="mb-2 btn btn-primary float-end" data-bs-toggle="modal"data-bs-target="#AddProjectTasks">Add Tasks</button>
			</div>
			<table class="table table-striped" id="data_table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Description</th>
                        <th>Charge</th>
					</tr>
				</thead>
				<tbody>
				@foreach($project->tasks as $task )
					<tr>
						<td>{{$task->id}}</td>
						<td>{{$task->description}} </td>
                        <td>{{$task->charge}} </td>
					</tr>
				@endforeach
				</tbody>
			</table>
	</div>
@stop