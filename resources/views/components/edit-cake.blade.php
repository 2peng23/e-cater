<div class="modal fade" id="update-cake" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Cake</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('update-cake') }}" id="update-cake-form" enctype="multipart/form-data"
                method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="update_cake_id" name="cake_id">
                    <div class="m-2">
                        <label for="update_category" class="form-label"> Category <span
                                class="text-danger">*</span></label>
                        <select name="update_category" id="update_category" class="form-select">
                            @foreach ($category as $item)
                                <option value="{{ $item->category_name }}">{{ $item->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <img class="rounded" id="update_image_preview" src="" alt=""
                            style="width: 120px">
                    </div>
                    <div class="m-2">
                        <label for="update_image" class="form-label"> Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="update_image" id="update_image">
                    </div>

                    <div class="m-2">
                        <label for="update_price" class="form-label"> Price <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="update_price" id="update_price" required>
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
