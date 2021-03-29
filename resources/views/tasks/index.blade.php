@extends('layouts.app')
@section('content')
	<div class="wrapper">
		@include('tasks.particles.sidebar')
		@include('tasks.particles.tasks_index')
		
	</div>

	@include('tasks.particles.add_categori')
	@include('tasks.particles.add_Task')
	@include('tasks.particles.edit_task_modal')
	
@endsection
@push('scripts')
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
	
	<script>

		$(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{route('TaskController@status')}}',
            data: {status, id},
            success: function(data){
                console.log(data.success)
            }
        });
    })
})

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
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endpush