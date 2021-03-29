<div class="modal fade" id="add_Task" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">New Tasks</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tasks.store') }}" method="POST">
                <div class="my-1">
                    <div class="col-md-12">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="newTaskName">
                                    Task Name
                                    <input type="text" name='newTaskName' class="form-control input-md"
                                        placeholder="Add Task Here">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="category_id">Category</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer px-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary">
                                        add Task
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
