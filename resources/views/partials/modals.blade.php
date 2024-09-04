{{-- Add Modal  --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Rooms</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="add-alert"></div>
                <form action="" class="p-4" id="add-form">
                    <div class="form-group row">
                        <label for="add-room-no" class="col-sm-3 col-form-label">Room No.</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="add-room-no"
                                placeholder="Room No.">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="add-room-seater" class="col-sm-3 col-form-label">Room Seater</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="add-room-seater" placeholder="Room Seater">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="add-room-status" class="col-sm-3 col-form-label">Room Status</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="add-room-status"
                                placeholder="Room Status">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="add-rent" class="col-sm-3 col-form-label">Rent</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-white">$</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)"
                                    id="add-rent"placeholder="Rent">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Add">
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Edit modal  --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Rooms</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="edit-alert"></div>
                <form action="" class="p-4" id="edit-form">
                    @csrf
                    <div class="form-group row">
                        <label for="edit-room-no" class="col-sm-3 col-form-label">Room No.</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-room-no"
                                placeholder="Room No.">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit-room-seater" class="col-sm-3 col-form-label">Room Seater</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-room-seater">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit-room-status" class="col-sm-3 col-form-label">Room Status</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-room-status"
                                placeholder="Room Status">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit-rent" class="col-sm-3 col-form-label">Rent</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-white">$</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)"
                                    id="edit-rent"placeholder="Rent">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update">
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Delete Modal --}}

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Room</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="delete-alert"></div>
                Are you sure, you want to delete this?
                <form id="delete-form" class="mt-2">
                    <div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
