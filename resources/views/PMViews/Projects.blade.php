@extends('layouts.app')

@section('content')

	<div class="container mt-5">
			<div>
				<button type="button" class="mb-2 btn btn-primary float-end" data-bs-toggle="modal"data-bs-target="#addProjectModal">Add Project</button>
			</div>
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
				@foreach($projects as $project )
					<tr>
						<td>{{$project->id}}</td>
						<td>{{$project->estimate}} J/H</td>
                        <td>{{$project->date}}</td>
						<td>{{$project->description}}</td>
						<td>
							<a href="{{route('project.show',['id'=>$project->id])}}"><i class="bi bi-eye-fill"></i></a>
							<a href="#" class="btnEdit"><i class="bi bi-pencil-square"></i></a>
							<a href="#" class="btnDelete"><i class="bi bi-trash-fill"></i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
	
	<br>
	{!! $projects->links()!!}

	</div>



<!-- Add Modal  -->
<div class="modal fade" id="addProjectModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="store_project">
			@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Add Project</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Estimate</label>
						<input type="text" class="form-control" name="estimate" required>
					</div>
					<div class="form-group">
						<label>date</label>
						<input type="text" class="form-control" name="date" required>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" name="description" required></textarea>
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cancel">
					<input  type="submit" id="hide" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editProjectModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
		<form id="edit_project">
			@csrf
			{{method_field('put')}}
				<div class="modal-header">						
					<h4 class="modal-title">Edit Project</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
						<input type="hidden" class="form-control" name="id" id="id" >
					<div class="form-group">
						<label>Estimate</label>
						<input type="text" class="form-control" name="estimate" id="estimate" required>
					</div>
					<div class="form-group">
						<label>date</label>
						<input type="text" class="form-control" name="date"  id="date" required>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" name="description" id="description" required></textarea>
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="save">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteProjectModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="delete_project">
			@csrf
				<input type="hidden" class="form-control" name="id" id="id" >
				<div class="modal-header">						
					<h4 class="modal-title">Delete Project</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-secondary" data-bs-dismiss="modal"value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>


@stop

@section('scripts')

	<script>
		$(document).ready(function()
		{
			$('#store_project').on("submit",function(e)
			{
				e.preventDefault();
				$.ajax({
				type:'post',
				url:'{{route('projects.store')}}',
				data:$("#store_project").serialize(),
                success: function () 
                {
                    $('#addProjectModal').modal('hide');
					alert('Data Saved');
					location.reload();

                }
                    });
                });
            });	
    </script>

	<script>
		$(document).ready(function()
		{
			$('.btnEdit').on("click",function(e)
				{
					$('#editProjectModal').modal('show');
					$tr=$(this).closest('tr');
					var data=$tr.children('td').map(function(){
						return $(this).text();
					}).get();
					$('#id').val(data[0]);
					$('#estimate').val(data[1]);
					$('#date').val(data[2]);
					$('#description').val(data[3]);

				});

			$('#edit_project').on("submit",function(e)
			  {
					e.preventDefault();
					var id=$('#id').val();
					$.ajax
					({
						type:'put',
						url:'/pm/project/update/'+id,
						data:$("#edit_project").serialize(),
						success: function () 
						{
							$('#editProjectModal').modal('hide');
							alert('Data Updated');
							location.reload();
						}
					});
                });
    });	
    </script>

	<script>
		$('.btnDelete').on("click",function(e)
				{
					$('#deleteProjectModal').modal('show');
					$tr=$(this).closest('tr');
					var data=$tr.children('td').map(function(){
						return $(this).text();
					}).get();
					$('#id').val(data[0]);
				});

			
				$('#delete_project').on("submit",function(e)
			  {
					e.preventDefault();
					var id=$('#id').val();
					$.ajax
					({
						type:'delete',
						url:'/pm/project/delete/'+id,
						data:$("#delete_project").serialize(),
						success: function () 
						{
							$('#deleteProjectModal').modal('hide');
							alert('Data Deleted');
							location.reload();
						}
					});
                });



	</script>

@stop



	

