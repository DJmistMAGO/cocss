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
                            <p>{{ $announce->subject }}</p>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label">Date:</label>
                                <p>{{ $announce->date->format('F d, Y') }}</p>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Time:</label>
                                <p>{{ date('h:i A', strtotime($announce->time)) }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">What:</label>
                            <p>{{ $announce->what }}</p>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Where: <span class="text-muted">(Optional)</span></label>
                            <p>{{ $announce->where }}</p>
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
