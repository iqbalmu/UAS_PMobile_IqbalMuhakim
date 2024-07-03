<div class="card">
    <h5 class="card-header">Diagnosis</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                {{-- <label for="diagnosis" class="form-label">Diagnosis</label> --}}
                <input class="form-control @error('diagnosis') is-invalid @enderror" type="text" name="diagnosis"
                    id="diagnosis" placeholder="diagnosis pasien" value="{{ old('diagnosis') }}" />
                @error('diagnosis')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <h5 class="card-header">Penatalaksanaan</h5>
    <div class="card-body">
        <div class="row">
            <div class="mb-3 col-md-12">
                <label for="penatalaksanaan" class="form-label">Tindakan</label>
                <input class="form-control @error('penatalaksanaan') is-invalid @enderror" type="text" name="penatalaksanaan"
                    id="penatalaksanaan" placeholder="riwayat penatalaksanaan pasien" value="{{ old('penatalaksanaan') }}" />
                @error('penatalaksanaan')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-md-12">
                <label for="catatan_dokter" class="form-label">Catatan Dokter</label>
                <textarea class="form-control @error('catatan_dokter') is-invalid @enderror" value="{{ old('catatan_dokter') }}" type="text"
                    id="catatan_dokter" name="catatan_dokter" placeholder="catatan"></textarea>
                @error('catatan_dokter')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>
