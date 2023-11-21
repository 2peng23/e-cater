<div class="modal fade" id="add-category" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Cake Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('create-category') }}" id="create-category-form" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="category_name" class="form-label">Category Name <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="category_name" id="category_name"
                        placeholder="Category Name" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary text-white">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
