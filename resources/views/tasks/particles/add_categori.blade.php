
<div class="modal fade" id="add_categori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">new categori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{ route('category.store') }}" method="post">
                <div class="modal-body">
                    <div class="row">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control input-lg" value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <input type="submit" value='add' class="btn btn-success" >
                        <a href="" class="btn btn-danger pull-right mb-2">Go Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> 