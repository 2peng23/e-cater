<div class="modal fade" id="info-cake" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cake Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-uppercase fw-bold fs-4">
                        <p>Category: <span id="info_cake_category"></span></p>
                        <p>Price: <span id="info_cake_price"></span></p>
                        <p>Stock: <span id="info_cake_stock"></span></p>
                    </div>
                    <div>
                        <img class="rounded" id="info_cake_image" style="width: 250px; height:250px;" alt="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="submit" class="btn btn-primary text-white">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
