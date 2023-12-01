<div class="modal fade" id="order-cake-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Term and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="text-justify">
                    <li class="mb-2">First Come, First Serve Basis</li>
                    <li class="mb-2">Fifty Percent (50%) Down payment shall be paid.</li>
                    <li class="mb-2">The balance shall be paid in FULL in CASH in the day of getting the ordered
                        cake/s.</li>
                    <li class="mb-2">Twenty Percent (20%) of the contract price shall be charged upon cancellation of
                        the ordered cake/s.</li>
                    <li class="mb-2">All payments shall be forfeited if cancellation is done two (2) days before
                        getting the cake/s. </li>
                    <li class="mb-2">These terms and conditions shall take effect only upon payment of the price
                        agreed upon.</li>

                </ul>

                <form action="{{ route('agree-term') }}" method="POST" id="agree-term-form">
                    @csrf
                    <input type="hidden" name="item_id" id="item_id">
                    <div class="mb-2">
                        <p class="text-danger" id='disagree'></p>
                    </div>
                    <div class="mb-2">
                        <label for="agree" class="form-label fw-bold">Accept Terms and Conditions</label>
                        <input type="checkbox" class="form-check p-2" name="agree" id="agree" value=1>
                    </div>
                    <button type="submit" class="btn btn-primary">Order Cake</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
