<div class="modal fade" id="add-cake" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Cake</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('add-cake') }}" id="add-cake-form" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="m-2">
                        <label for="category" class="form-label"> Category <span class="text-danger">*</span></label>
                        <select name="category" id="category" class="form-select">
                            @foreach ($category as $item)
                                <option value="{{ $item->category_name }}">{{ $item->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="m-2">
                        <label for="image" class="form-label"> Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="image" id="image" required>
                    </div>

                    <div class="m-2">
                        <label for="price" class="form-label"> Price <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="price" id="price" required>
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
