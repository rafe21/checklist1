<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">My Tasks</h4>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                @if(count($storedTasks) != 0)
                                <table class="table">
                                    
                                    <thead>
                                        <th>Task #</th>
                                        <th>status</th>
                                        <th>Name</th>
                                        <th>category name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>
                                    
                                    <tbody>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6 chart">
                                                    <canvas id="myChart"></canvas>                                                                               
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        @foreach ($storedTasks as $storedTask)
                                            {{ csrf_field() }}

                                            
                                            <tr data-id="{{ $storedTask->id }}">

                                                <th>{{ $loop->iteration }}</th>
                                                <th><input data-id="{{$storedTask->id}}" class="toggle-class" type="checkbox"  {{ $storedTask->status ? 'checked' : '' }}></th>
                                                <td>{{ $storedTask->name }}</td>
                                                <td>{{ !is_null($category = $storedTask->category) ? $category->name : '' }}</td>
                                                
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
@push('scripts')
    <script>
        
let labels1 = ['Completed Task' , 'Uncompleted Task']
let data1 = [{{$completed}} , {{$uncompleted}}]
let colors1 = ['#329FDF' ,'grey']

var ctx = document.getElementById('myChart').getContext('2d');
var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',

    // The data for our dataset
    data: {
        labels: labels1,
        datasets: [{
            labels: labels1,
            data: data1,
            backgroundColor: colors1,
            
        }]
    },
    
    // Configuration options go here
    options: {
        title: {
            
            display: true
                 }}
});
    </script>
@endpush