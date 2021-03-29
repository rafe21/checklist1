
<div class="modal fade" id="add_categori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">New Categori</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{ route('category.store') }}" method="post">
                <div class="modal-body">
                    <div class="row">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            Categori Name
                            <input type="text" name="name" id="name" placeholder="Add Category Name" class="form-control input-lg" value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <input type="submit" value='add' class="btn btn-primary" >
                        <a href="" class="btn  pull-right mb-2">Go Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> 