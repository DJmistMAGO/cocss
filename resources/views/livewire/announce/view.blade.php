<form wire:submit.prevent="update">
    <div wire:ignore.self class="modal fade" id="view" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">View Announcement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Subject:</label>
                            <input readonly  type="text" class="form-control" name="subject"
                                wire:model="subject">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label">Date:</label>
                                <input readonly  type="date" class="form-control" name="date"
                                    wire:model="date">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Time:</label>
                                <input readonly  type="time" class="form-control" name="time"
                                    wire:model="time" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">What:</label>
                            <textarea readonly class="form-control" name="what" wire:model="what" id="" cols="30" rows="1"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Where: <span class="text-muted">(Optional)</span></label>
                            <input readonly  type="text" class="form-control" name="where"
                                wire:model="where">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
