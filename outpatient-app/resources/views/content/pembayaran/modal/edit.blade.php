<div class="modal fade" id="modalPembayaran" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('pembayaran.update') }}" method="post">
                @csrf
                @method('put')

                <div class="modal-header">
                    <h5 class="modal-title" id="modalPembayaranTitle">Proses Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_pembayaran" id="id_pembayaran">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="mrn" class="form-label">MRN</label>
                            <input type="text" name="mrn" class="form-control" value="" id="mrn" readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="harga" class="form-label">Total Harga</label>
                            <input type="text" name="harga" class="form-control" value="" id="harga" readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="pembayaran" class="form-label">Pembayaran</label>
                            <input type="text" name="pembayaran" class="form-control" value="" id="pembayaran">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
