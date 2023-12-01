<div class="modal fade" id="add-billing-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Gcash Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('add-billing') }}" id="add-billing-form" enctype="multipart/form-data"
                method="POST">
                @csrf
                <div class="modal-body">
                    <div class="m-2">
                        <label for="name" class="form-label"> Account Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="m-2">
                        <label for="number" class="form-label"> Account Number <span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="number" id="number" required>
                    </div>
                    <div class="m-2">
                        <label for="image" class="form-label"> QR Code <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="image" id="image" accept="image/*"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary text-white">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
