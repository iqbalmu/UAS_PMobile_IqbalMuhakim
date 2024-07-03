<div class="card">
    {{-- <h5 class="card-header">Keluhan</h5> --}}
    <div class="card-body">
        <div class="row">
            <div class="mb-3 col-md-12">
                {{-- <label for="pasien" class="form-label">Pasien</label> --}}
                {{-- <select id="pasien" class="select2 form-select @error('pasien_id') is-invalid @enderror" name="pasien_id"
                    autofocus>
                    <option value="">Select Pasien</option>
                    @foreach ($users as $pasien)
                        <option value="{{ $pasien->pasien->mrn }}">
                            {{ $pasien->pasien->mrn }} ( {{ $pasien->nama }} )
                        </option>
                    @endforeach
                </select> --}}
                @error('pasien_id')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="nama" class="form-label">Keluhan</label>
                <textarea class="form-control @error('keluhan') is-invalid @enderror" value="{{ old('keluhan') }}" type="text"
                    id="keluhan" name="keluhan" placeholder="keluhan pasien" autofocus></textarea>
                @error('keluhan')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <h5 class="card-header">Riwayat</h5>
    <div class="card-body">
        <div class="row">
            <div class="mb-3 col-md-12">
                <label for="riwayat_kesehatan" class="form-label">Kesehatan</label>
                <input class="form-control @error('riwayat_kesehatan') is-invalid @enderror" type="text" name="riwayat_kesehatan"
                    id="riwayat_kesehatan" placeholder="riwayat kesehatan pasien" value="{{ old('riwayat_kesehatan') }}" />
                @error('riwayat_kesehatan')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-md-12">
                <label for="riwayat_obat" class="form-label">Obat</label>
                <input class="form-control @error('riwayat_obat') is-invalid @enderror" type="text" name="riwayat_obat"
                    id="riwayat_obat" placeholder="riwayat penggunaan obat pasien" value="{{ old('riwayat_obat') }}" />
                @error('riwayat_obat')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>
