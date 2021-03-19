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

	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
	<link rel="icon" type="image/png" href="/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
	<!-- CSS Files -->
	<link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('/css/light-bootstrap-dashboard.css?v=2.0.0')}}" rel="stylesheet" />
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="{{asset('/css/demo.css')}}" rel="stylesheet" />
   
   

</head>
<body>


	<div class="wrapper">
		<div class="sidebar" data-color="blue" data-image="{{asset('/img/sidebar-5.jpg')}}">
			<!--
		Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		Tip 2: you can also add an image using data-image tag
	-->
			<div class="sidebar-wrapper">
				<div class="logo">
					<a href="http://www.creative-tim.com" class="simple-text">
						Task List
					</a>
				</div>
				<ul class="nav">
					<li>
						<a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#add_Task">
							<i class="nc-icon nc-chart-pie-35"></i>
							<p>add task</p>
						</a>
					</li>
					<li>
						<a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#add_categori">
						   <i class="nc-align-left-2"></i>
							<p>add category</p>
						</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="./table.html">
							<i class="nc-icon nc-notes"></i>
							<p>Table List</p>
						</a>
					</li>
					<li>
						<a class="nav-link" href="./typography.html">
							<i class="nc-icon nc-paper-2"></i>
							<p>Typography</p>
						</a>
					</li>
					<li>
						<a class="nav-link" href="./icons.html">
							<i class="nc-icon nc-atom"></i>
							<p>Icons</p>
						</a>
					</li>
					<li>
						<a class="nav-link" href="./maps.html">
							<i class="nc-icon nc-pin-3"></i>
							<p>Maps</p>
						</a>
					</li>
					<li>
						<a class="nav-link" href="./notifications.html">
							<i class="nc-icon nc-bell-55"></i>
							<p>Notifications</p>
						</a>
					</li>
					
				</ul>
			</div>
		</div>
		<div class="main-panel">
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg " color-on-scroll="500">
				<div class="container-fluid">
					<button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-bar burger-lines"></span>
						<span class="navbar-toggler-bar burger-lines"></span>
						<span class="navbar-toggler-bar burger-lines"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-end" id="navigation">
						<ul class="nav navbar-nav mr-auto">
							
							
							
						</ul>
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="#pablo">
									<span class="no-icon">Account</span>
								</a>
							</li>
							<li class="nav-item dropdown">
								
								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something</a>
									<a class="dropdown-item" href="#">Something else here</a>
									<div class="divider"></div>
									<a class="dropdown-item" href="#">Separated link</a>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#pablo">
									<span class="no-icon">Log out</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- End Navbar -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card strpied-tabled-with-hover">
								<div class="card-header ">
									<h4 class="card-title">Tasks</h4>
								</div>
								<div class="card-body table-full-width table-responsive">
									<table class="table table-hover table-striped">
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
						</div>
					   
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
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
							<button class="btn" data-toggle="modal" data-target="#add_categori"><i type="submit" class="fa fa-plus-square" ></i></button>
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

				

					<div class="col-md-6">
						
						
						<button class="btn" data-toggle="modal" data-target="#add_categori"><i type="submit" class="fa fa-plus-square" ></i></button>

					</div>

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
		</nav>
    	</div>
    </div>

	@include('tasks.particles.add_categori')
	@include('tasks.particles.add_Task')
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
<!--   Core JS Files   -->
<script src="{{asset('/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="/js/plugins/bootstrap-switch.js"></script>
<!--  Chartist Plugin  -->
<script src="{{asset('/js/plugins/chartist.min.js')}}" type="text/javascript"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('/js/plugins/bootstrap-notify.js')}}" type="text/javascript"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{asset('/js/light-bootstrap-dashboard.js?v=2.0.0 ')}}" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('/js/demo.js')}}" type="text/javascript"></script>
</html>






<!--
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.  -->
 
 

 








