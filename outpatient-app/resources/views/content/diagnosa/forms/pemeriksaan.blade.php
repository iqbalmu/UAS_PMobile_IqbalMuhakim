<div class="card">
    <h5 class="card-header">Fisik</h5>
    <div class="card-body">
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="suhu" class="form-label">Suhu</label>
                <input class="form-control @error('suhu') is-invalid @enderror" value="{{ old('suhu') }}" type="number"
                    id="suhu" name="suhu" placeholder="" />
                @error('suhu')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="tekanan_darah" class="form-label">Tekanan Darah</label>
                <input class="form-control @error('tekanan_darah') is-invalid @enderror" value="{{ old('tekanan_darah') }}"
                    type="number" id="tekanan_darah" name="tekanan_darah" placeholder="" />
                @error('tekanan_darah')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="nadi" class="form-label">Nadi</label>
                <input class="form-control @error('nadi') is-invalid @enderror" value="{{ old('nadi') }}"
                    type="number" id="nadi" name="nadi" placeholder="" />
                @error('nadi')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="pernapasan" class="form-label">Pernapasan</label>
                <input class="form-control @error('pernapasan') is-invalid @enderror" value="{{ old('pernapasan') }}"
                    type="number" id="pernapasan" name="pernapasan" placeholder="" />
                @error('pernapasan')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="tinggi" class="form-label">Tinggi Badan</label>
                <input class="form-control @error('tinggi') is-invalid @enderror" value="{{ old('tinggi') }}"
                    type="number" id="tinggi" name="tinggi" placeholder="" />
                @error('tinggi')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="berat" class="form-label">Berat Badan</label>
                <input class="form-control @error('berat') is-invalid @enderror" value="{{ old('berat') }}"
                    type="number" id="berat" name="berat" placeholder="" />
                @error('berat')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <h5 class="card-header">Penunjang (opsional)</h5>
    <div class="card-body">
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="labor" class="form-label">Laboratorium</label>
                <input class="form-control @error('labor') is-invalid @enderror" value="{{ old('labor') }}"
                    type="number" id="labor" name="labor" placeholder="" />
                @error('labor')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="rontgen" class="form-label">Rontgen</label>
                <input class="form-control @error('rontgen') is-invalid @enderror" value="{{ old('rontgen') }}"
                    type="number" id="rontgen" name="rontgen" placeholder="" />
                @error('rontgen')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="usg" class="form-label">USG</label>
                <input class="form-control @error('usg') is-invalid @enderror" value="{{ old('usg') }}"
                    type="number" id="usg" name="usg" placeholder="" />
                @error('usg')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="ctscan" class="form-label">CT Scan</label>
                <input class="form-control @error('ctscan') is-invalid @enderror" value="{{ old('ctscan') }}"
                    type="number" id="ctscan" name="ctscan" placeholder="" />
                @error('ctscan')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="mri" class="form-label">MRI</label>
                <input class="form-control @error('mri') is-invalid @enderror" value="{{ old('mri') }}"
                    type="number" id="mri" name="mri" placeholder="" />
                @error('mri')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>
