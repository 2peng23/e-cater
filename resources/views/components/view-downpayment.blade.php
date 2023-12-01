<div class="modal fade" id="view-down-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Proof of Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- <form action="{{ route('add-cake') }}" id="add-cake-form" enctype="multipart/form-data" method="POST">
                @csrf --}}
            <div class="modal-body">
                <div class="m-2">
                    <img src="{{ $rental }}" alt="" style="width: 300px; height: 300px">
                </div>
                {{-- <div class="m-2">
                    <label for="image" class="form-label"> Image <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="image" id="image" accept="image/*" required>
                </div>

                <div class="m-2">
                    <label for="price" class="form-label"> Price <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="price" id="price" required>
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="submit" class="btn btn-primary text-white">Save changes</button> --}}
            </div>
            {{-- </form> --}}
        </div>
    </div>
</div>
