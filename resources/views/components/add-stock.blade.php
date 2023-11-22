<div class="modal fade" id="add-stock" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Cake Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('add-stock') }}" id="add-stock-form" method="POST">
                @csrf
                <input type="hidden" name="cake_id" id="cake_id">
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="stock" class="form-label">Current Stock</label>
                        <input type="number" readonly class="form-control" name="beginning_stock" id="beginning_stock"
                            placeholder="Beginning Stock" required>
                    </div>
                    <div class="mb-2">
                        <label for="stock" class="form-label">Ending Stock </label>
                        <input type="number" readonly class="form-control" name="ending_stock" id="ending_stock"
                            placeholder="Ending Stock" required>
                    </div>
                    <hr>
                    <div class="mb-2">
                        <label for="stock" class="form-label">Add Stock <span class="text-danger">*</span></label>
                        <input type="number" min="1" class="form-control" name="stock" id="stock"
                            placeholder="Stock value" required>
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
