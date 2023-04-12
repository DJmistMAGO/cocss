<form wire:submit.prevent="store">
    <div wire:ignore.self class="modal fade" id="view" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Veiw Medicine</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Name of Medicine:</label>
                            <input type="text" class="form-control" wire:model="med_name" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Expiration Date:</label>
                            <input type="date" class="form-control" wire:model="exp_date">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Medicine Description:</label>
                            <textarea name="reason" rows="3" class="form-control" readonly style="resize: vertical;" wire:model="med_description"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Quantity:</label>
                            <input type="number" class="form-control" wire:model="med_quantity" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
