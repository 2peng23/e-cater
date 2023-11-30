<div class="modal fade" id="rent-cater-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Term and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>First Come, First Serve Basis</li>
                    <li>The client shall pay a reservation fee equivalent to fifty percent of the contract price to
                        block the slot. Such amount shall be deducted from the total cost.</li>
                    <li>Fifty Percent (50%) Down payment shall be paid at least one (1) month before the event</li>
                    <li>The balance shall be paid in FULL in CASH in one week before the event or right after the event.
                        Cheques shall not be accepted.</li>
                    <li>All Prices are exclusive of 12% Value Added Tax and Delivery and Pull-Out Fee.</li>
                    <li>Twenty Percent (20%) of the contract price shall be charged upon cancellation of the contract.
                    </li>
                    <li>All payments shall be forfeited if cancellation is done two (2) days before the event date.</li>
                    <li>Any losses, breakage, gate entrance fee and caterer’s bond and other charges at the venue shall
                        be charged to the client’s bill.</li>
                    <li>For Rental of Items: Rate of Rental is computed on a daily basis or on the date specified on the
                        contract. The client shall be obliged to return the rented items after the event. In the event
                        of a rush order and In case of unavailability of the chosen design, or style of a particular
                        item/s, the Supplier reserves the right to substitute with similar item/s with almost the same
                        design or style without prior approval of the client.</li>
                    <li>The security deposit shall be treated as liquidated damages in case the client shall not return
                        on time for any reason whatsoever. However, in case the client incurs a delay in the return of
                        the whole set of the rented items, the client shall be charged additional damages in the amount
                        equivalent per day of contract for every day of delay.</li>
                    <li>This Contract shall take effect only upon payment of the price agreed upon.</li>
                </ul>

                <form action="{{ route('agree-term') }}" method="POST" id="agree-term-form">
                    @csrf
                    <div class="mb-2">
                        <p class="text-danger" id='disagree'></p>
                    </div>
                    <div class="mb-2">
                        <label for="agree" class="form-label fw-bold">Accept Terms and Conditions</label>
                        <input type="checkbox" class="form-check p-2" name="agree" id="agree" value=1>
                    </div>
                    <button type="submit" class="btn btn-primary">Rent Package</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
