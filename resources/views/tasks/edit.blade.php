
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

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
             <div class="row">
                 <form action="{{ route('tasks.update' , [$taskUnderEdit->id] ) }}" method="post">
                    {{ csrf_field() }}
                     <div class="form-group">
                        <input type="text" class="form-control input-lg" value="{{ $taskUnderEdit->name }}">
                     </div>
                     <div class="form-group">
                        <input type="submit" value='save changes' class="btn btn-success btn-lg" >
                        <a href="" class="btn btn-danger btn-lg pull-right">Go Back</a>
                     </div>
                 </form>
             </div>
        </div> 
    </div>
  </body>
</html>