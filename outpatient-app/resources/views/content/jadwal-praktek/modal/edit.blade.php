<div class="modal fade" id="modalEditJadwal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('jpraktek.update') }}" method="post">
                @csrf
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditJadwalTitle">Edit Jadwal Praktek</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="dokter" class="form-label">Dokter</label>
                            <select id="dokter" class="form-control" name="dokter_id" style="width: 100%;">
                                <option value="" id="select-dokter">--</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="hari" class="form-label">Hari</label>
                            <select id="select-hari" class="form-control" name="hari" style="width: 100%;">
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="mulai" class="form-label">Mulai</label>
                            <input type="time" name="mulai" id="mulai" class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label for="selesai" class="form-label">Selesai</label>
                            <input type="time" name="selesai" id="selesai" class="form-control">
                        </div>
                    </div>
                    <input type="hidden" name="id_jadwal" id="id_jadwal">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
