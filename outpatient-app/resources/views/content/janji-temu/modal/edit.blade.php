<div class="modal fade" id="modalUpdateStatusTemu" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('temu.update') }}" method="post">
                @csrf
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUpdateStatusTemuTitle">Janji Temu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <div class="row">
                        <div class="col mb-3">
                            <label for="pasien" class="form-label">Pasien</label>
                            <input type="text" name="pasien" class="form-control" value="" id="input-pasien"
                                disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="dokter" class="form-label">Dokter</label>
                            <input type="text" name="dokter" class="form-control" value="" id="input-dokter"
                                disabled>
                        </div>
                    </div> --}}
                    <input type="hidden" name="id" id="antrianId">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="pasien" class="form-label">Status</label>
                            <select id="pasien" class="form-control" name="status" style="width: 100%;">
                                <option value="prosess">Proses</option>
                                <option value="rejected">Reject</option>
                                <option value="accepted">Accept</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>
