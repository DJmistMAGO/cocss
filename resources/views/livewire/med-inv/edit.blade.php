<form wire:submit.prevent="store">
    <div wire:ignore.self class="modal fade" id="edit" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Medicine</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Name of Medicine:</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Date of Expiration:</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Quantity:</label>
                            <input type="number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
