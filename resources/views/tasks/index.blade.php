<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">



    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tasks list</title>
</head>
<body>
    <div class="container">
        
        <div class="col-md-offset-2 col-md-8">
            <div class="row">
                <h1>tasks list</h1>
            </div>
            {{--رسالة اضافة المهمة--}}
            @if (Session::has('success'))
               <div class="alert alert-success">

                  <strong>Success:</strong> {{ Session::get('success') }}

               </div>
             
            @endif
      


            {{--رسالة الخطأ--}}
             @if (count($errors) > 0)

              <div class="alert alert-danger">
                  <strong>Error:</strong>
                  <ul>
                      @foreach ($errors->all() as $errors)
                          <li>{{ $errors }}</li>
                      @endforeach
                  </ul>
              </div>

             @endif


			<form action="{{ route('tasks.store') }}" method='POST'>
                <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
                {{ csrf_field() }}

                   <div class="col-md-9">
                     <input type="text" name='newTaskName' class="form-control">
                   </div>

                   <div class="col-md-3">
                    <input type="submit" class='btn btn-primary btn-block' value='add Task'>
                   </div>   
                </div>
            </form>
            @include('tasks.particles.edit_task_modal')
			@if(count($storedTasks) != 0)
				<table class="table">

					<thead>
						<th>Task #</th>
						<th>Name</th>
						<th>Edit</th>
						<th>Delete</th>
					</thead>

					<tbody>
						@foreach ($storedTasks as $storedTask)
						<form action="{{ route('TaskController@edit') }}" method='POST'>


                           
							{{ csrf_field() }}

						<tr data-id="{{ $storedTask->id }}">
							<th>{{ $loop->iteration }}</th>
							<td>{{ $storedTask->name }}</td>
							<td>
							 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit_task" onclick="editTask('{{$storedTask->id}}')">
								Edit
							</button>
						</form>
							
							</td>                    
							<td>
								<form action="{{  route('tasks.destroy' , ['task'=>$storedTask->id]) }}" method="POST">
									{{ csrf_field() }}
									<input type="hidden" name='_method' value="DELETE">
									
									<input type="submit" class="btn btn-danger" value="Delete">
								</form>
							</td>
							</tr>
						@endforeach
					</tbody>
				</table>
            @endif

    	</div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script>
		const editTask = (task_id) => {

			$.ajax({
				url: "{{route('TaskController@edit')}}", 
				data: {
					task_id
				},
				success: function(response) {
					$('#name').val(response.name);
					$('#id').val(response.id);
				}
			})
		}
	</script>
</body>
</html>