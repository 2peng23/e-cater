<div class="modal fade" id="update-package" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('update-package') }}" id="update-package-form" enctype="multipart/form-data"
                method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="m-2">
                        <label for="edit_name" class="form-label"> Package Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="edit_name" id="edit_name" required>
                    </div>
                    <div class="mb-2">
                        <img class="rounded" id="update_image_preview" src="" alt=""
                            style="width: 120px">
                    </div>
                    <div class="m-2">
                        <label for="edit_image" class="form-label"> Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="edit_image" accept="image/*" id="edit_image">
                    </div>
                    <div class="m-2">
                        <label for="edit_price" class="form-label"> Price <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="edit_price" id="edit_price" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary text-white">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
