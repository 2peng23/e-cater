<div class="modal fade" id="add-package" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('add-package') }}" id="add-package-form" enctype="multipart/form-data"
                method="POST">
                @csrf
                <div class="modal-body">
                    <div class="m-2">
                        <label for="name" class="form-label"> Package Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="m-2">
                        <label for="image" class="form-label"> Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="image" accept="image/*" id="image"
                            required>
                    </div>
                    <div class="m-2">
                        <label for="inclusion" class="form-label">Inclusion<span class="text-danger">*</span></label>
                        <div class="row" id="inc-container">
                            <div class="col-6 mb-2">
                                <input type="text" class="form-control" name="inclusion[]" id="inclusion1" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="rounded-circle bg-primary text-white" id="add-inclusion"><i
                                    class="fa fa-plus "></i></button>
                        </div>
                    </div>
                    <div class="m-2">
                        <label for="price" class="form-label"> Price <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="price" id="price" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary text-white">Save package</button>
                </div>
            </form>
        </div>
    </div>
</div>
