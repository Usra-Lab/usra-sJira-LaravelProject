@extends('layouts.app')

@section('content')
<!---------------------------------------- AddProjectSprints ---------------------------------------->

<div class="modal fade" id="AddProjectSprints" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close btn-close-dark " data-bs-dismiss="modal"></button>
                    <form method="post" action="{{route('project_sprints.add',['id'=>$project->id])}}">
                        @csrf
                        <select name="SId[]" class="form-select mt-4" aria-label="Default select example" multiple >
                            @foreach ($sprints as $sprint) 
                                <option value="{{$sprint->id}}"><h3>{{$sprint->titre}}</h3></option>
                            @endforeach
                        </select>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-secondary">AddSprints</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

<!-------------------------------------------------------------------------------->

	<div class="container mt-5">
			<div>
				<button type="button" class="mb-2 btn btn-primary float-end" data-bs-toggle="modal"data-bs-target="#AddProjectSprints">Add Sprints</button>
			</div>
			<table class="table table-striped" id="data_table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Title</th>
					</tr>
				</thead>
				<tbody>
				@foreach($project->sprints as $sprint )
					<tr>
						<td>{{$sprint->id}}</td>
						<td>{{$sprint->titre}} </td>
					</tr>
				@endforeach
				</tbody>
			</table>
	</div>
@stop