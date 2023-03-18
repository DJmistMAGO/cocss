<form wire:submit.prevent="store">
    <div wire:ignore.self class="modal fade" id="create" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Book an Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Set Date:</label>
                            <input type="date" min="{{ date('Y-m-d') }}" class="form-control" name="appointment_date"
                                wire:model="appointment_date">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Set Time:</label>
                            <input type="time" class="form-control" required name="appointment_time"
                                wire:model="appointment_time">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Reason:</label>
                            <textarea name="reason" rows="3" class="form-control" style="resize: horizontal;" wire:model="reason"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
