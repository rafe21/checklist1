<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="#" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tasks list</title>
	
	<link href="/css/taskstyle.css"  rel="stylesheet"/>
	<link href="/css/demo.css"  rel="stylesheet"/>
	<link href="/css/light-bootstrap-dashboard.css"  rel="stylesheet"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   

</head>
<body>

    <div class="container">
        
        <div class="col-md-offset-2 col-md-8">
            
                <h1>tasks list</h1>

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

			<div class="row">

				  {{--اضافة مهمة--}}

				<form action="{{ route('tasks.store') }}" class="col-md-6" method='POST'>
					<div class="row" style="margin-top: 10px; margin-bottom: 10px;">
					{{ csrf_field() }}

					<div class="col-md-8">
							<label for="newTaskName">
								Task Name
								<input type="text" name='newTaskName' class="form-control">
							</label>
							<input type="submit" class='btn btn-primary btn-block' value='add Task'>
					</div>
					<div class="col-md-4">
						<label for="category_id">Category</label>
						<select name="category_id" id="category_id">
							@foreach ($categories as $category)
								<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
					   </div>
					 </div>	
				 </form>


			{{--اضافة تصنيف--}}

				{{-- <form action="{{ route('category.store') }}" class="col-md-6" method='POST'>
					
					<div class="row" style="margin-top: 10px; margin-bottom: 10px;">
					{{ csrf_field() }} --}}

					<div class="col-md-6">
						{{-- <label for="categoryName">
							category Name
							<input type="text" name='categoryName' class="form-control">
						</label>
						<input type="submit" class='btn btn-primary btn-block' value='add category'> --}}
						
						<button class="btn" data-toggle="modal" data-target="#add_categori"><i type="submit" class="fa fa-plus-square" ></i></button>

					</div>
					{{-- <div class="col-md-4">
						<label for="category_id">Category</label>
						<select name="category_id" id="category_id">
							@foreach ($categories as $category)
								<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
					  </div>
					</div>
				</form> --}}
			

			@if(count($storedTasks) != 0)
				<table class="table">

					<thead>
						<th>Task #</th>
						<th>category name</th>
						<th>Name</th>
						<th>Edit</th>
						<th>Delete</th>
					</thead>

					<tbody>
						@foreach ($storedTasks as $storedTask)
							{{ csrf_field() }}

						<tr data-id="{{ $storedTask->id }}">
							<th>{{ $loop->iteration }}</th>
							<td>{{ !is_null($category = $storedTask->category) ? $category->name : '' }}</td>
							<td>{{ $storedTask->name }}</td>

							<td>

								<i type="submit" class="fa fa-edit" data-toggle="modal" data-target="#edit_task"   onclick="editTask('{{$storedTask->id}}')" ></i>

							</td> 

								<td>
									<form action="{{  route('tasks.destroy' , ['task'=>$storedTask->id]) }}" method="POST">
										{{ csrf_field() }}
										<input type="hidden" name='_method' value="DELETE">

										<button class="btn"><i class="fas fa-trash-alt"></i></button>
									</form>
								</td> 
							</tr>
						@endforeach
					</tbody>
				</table>
            @endif

    	</div>
    </div>

	@include('tasks.particles.add_categori')
	@include('tasks.particles.edit_task_modal')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script>
		const editTask = (task_id) => {
            console.log (task_id);
			$.ajax({
				url: "{{route('TaskController@edit')}}", 
				data: {
					task_id,
				},
				success: function(response) {
					$('#edit_task #name').val(response.name);
					$('#edit_task #id').val(response.id);
				}
			})
		}
	</script>
	<script src="js/login.js" ></script>
</body>
</html>