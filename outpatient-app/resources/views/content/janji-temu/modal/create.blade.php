<div class="modal fade" id="modalTemu" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('temu.store') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTemuTitle">Buat Janji Temu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="pasien" class="form-label">Pasien</label>
                            <select id="pasien" class="form-control" name="pasien_id" style="width: 100%;">
                                <option value="">nama pasien</option>
                                @foreach ($pasiens as $pasien)
                                    <option value="{{ $pasien->pasien->mrn }}">
                                        {{ $pasien->pasien->mrn }} {{ $pasien->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="dokter" class="form-label">Dokter</label>
                            <select id="dokter" class="form-control" name="dokter_id" style="width: 100%;">
                                <option value="">nama dokter</option>
                                @foreach ($dokters as $dokter)
                                    <option value="{{ $dokter->dokter->id_dokter }}">
                                        {{ $dokter->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label for="waktu" class="form-label">Waktu</label>
                            <input type="time" name="waktu" id="waktu" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Buat Janji</button>
                </div>
            </form>
        </div>
    </div>
</div>
