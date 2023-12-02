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
                <div>
                    <div id="cake-info" style="display: none">
                        <p class="mb-2">Quantity: <span id="cake_quantity"></span></p>
                        <p class="mb-2">Price: <span id="cake_price"></span></p>
                        <p class="mb-2">Total Price: <span id="cake_totalPrice"></span></p>
                        <p class="mb-2">Downpayment: <span id="cake_downpayment"></span></p>
                    </div>

                    <div style="display: none" id="package-info">
                        <p class="mb-2" id="package-price"></p>
                        <p class="mb-2" id="package-downpayment"></p>
                    </div>
                    <div class="m-2">
                        <img src="" id="downpayment-image" alt="" style="width: 300px; height: 300px">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="submit" class="btn btn-primary text-white">Save changes</button> --}}
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
