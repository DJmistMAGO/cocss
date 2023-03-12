<div wire:ignore.self class="modal fade" id="view" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">View Check Up Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="form-label">Date:</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-label">Time:</label>
                        <input type="time" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-label">Result:</label>
                        <textarea name="" id="" rows="1" class="form-control " style="resize: vertical;"></textarea>
                    </div>
                </div>
                {{-- <div class="row mb-3">
                    <div class="col-md-12">
                        <button class="btn btn-primary col-md-2 add-medicine">Add Medicine</button>
                        <button class="btn btn-danger col-md-2 delete-medicine">Delete Item</button>
                    </div>
                </div> --}}
                <div class="row form-medicine">
                    <div class="form-group col-md-2">
                        <label class="form-label">Qty.:</label>
                        <input type="text" class="form-control" id="qty0" name="qty[]">
                    </div>
                    <div class="form-group col-md-5">
                        <label class="form-label">Medicine Name:</label>
                        <select name="medicine[]" class="form-control" id="">
                            <option value="">--Please Select--</option>
                            <option value="">Paracetamol</option>
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <label class="form-label">Time to Take:</label>
                        <textarea name="" id="time0" rows="1" class="form-control " style="resize: vertical;" name="time[]"></textarea>
                    </div>
                </div>
            </div>
             <div class="modal-footer d-flex">
                <button class="btn btn-danger" class="close" data-dismiss="modal">Close</button>
             </div>
        </div>
    </div>
</div>
</form>
