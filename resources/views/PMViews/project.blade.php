@extends('layouts.app')

@section('content')
<!---------------------------------------- AddUsersProject ---------------------------------------->

<div class="modal fade" id="AddUsersProject" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close btn-close-dark " data-bs-dismiss="modal"></button>
                    <form method="post" action="{{route('project_roles.add',['id'=>$project->id])}}">
                        @csrf
                        <select name="RId[]" class="form-select mt-4" aria-label="Default select example" multiple >
                            @foreach ($users as $user) 
                                <option value="{{$user->id}}"><h3>{{$user->role}} ({{$user->name}})</h3></option>
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
			<button type="button" class="mb-2 btn btn-primary float-end" data-bs-toggle="modal"data-bs-target="#AddUsersProject">Add Roles</button>
		</div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                </tr>
            </thead>		  
            <tbody>
                @foreach ($project->roles as $role) 
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                </tr>
                @endforeach
            </tbody>  
        </table>
    </div>
    
@stop