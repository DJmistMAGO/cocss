<form wire:submit.prevent="view">
    <div wire:ignore.self class="modal fade" id="view" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">View Health Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Date:</label>
                            <input type="date" class="form-control" wire:model="date">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label">Time:</label>
                            <input type="time" class="form-control" wire:model="time">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label">Result:</label>
                            <textarea name="" id="" rows="1" class="form-control " style="resize: vertical;"
                                wire:model="result"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Qty.:</label>
                            <input type="text" class="form-control" wire:model="med_qty">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Medicine Name:</label>
                            <input type="text" class="form-control" wire:model="med_name">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Time to Take:</label>
                            <textarea name="" id="" rows="1" class="form-control " style="resize: vertical;"
                                wire:model="med_time"></textarea>
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
