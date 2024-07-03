<div class="card">
    <h5 class="card-header">Resep</h5>
    <div class="card-body">
        <div id="input-resep">
            <div class="row">
                <div class="mb-3 col-md-2">
                    <label for="obat" class="form-label">Obat</label>
                    {{-- <input class="form-control @error('obat') is-invalid @enderror" value="{{ old('obat') }}"
                        type="text" id="obat" name="obat[]" placeholder="nama obat" /> --}}
                    <select class="form-control select-obat @error('obat') is-invalid @enderror"
                        name="obat[]" data-placeholder="--">
                        <option value="">--</option>
                        @foreach ($obats as $obat)
                            <option value="{{ $obat->id_obat }}">
                                {{ $obat->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('obat')
                        <div class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-2">
                    <label for="dosis" class="form-label">Dosis</label>
                    <input class="form-control @error('dosis') is-invalid @enderror" value="{{ old('dosis') }}"
                        type="text" id="dosis" name="dosis[]" placeholder="ex: 500mg" />
                    @error('dosis')
                        <div class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-2">
                    <label for="frekuensi" class="form-label">Frekuensi</label>
                    <input class="form-control @error('frekuensi') is-invalid @enderror" value="{{ old('frekuensi') }}"
                        type="text" id="frekuensi" name="frekuensi[]" placeholder="ex: 3x1" />
                    @error('frekuensi')
                        <div class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-2">
                    <label for="durasi" class="form-label">Durasi</label>
                    <input class="form-control @error('durasi') is-invalid @enderror" value="{{ old('durasi') }}"
                        type="text" id="durasi" name="durasi[]" placeholder="hari/minggu/bulan" />
                    @error('durasi')
                        <div class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-2">
                    <label for="metode" class="form-label">Metode</label>
                    {{-- <input class="form-control @error('metode') is-invalid @enderror" value="{{ old('metode') }}"
                        type="text" id="metode" name="metode[]" placeholder="" /> --}}
                    <select class="form-control @error('metode') is-invalid @enderror" name="metode[]"
                        style="width: 100%">
                        <option value="">--</option>
                        <option value="PO">Per Oral</option>
                        <option value="SL">Sublingual</option>
                        <option value="IM">Intramuskular</option>
                        <option value="IV">Intravena</option>
                    </select>
                    @error('metode')
                        <div class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-2">
                    <label for="syarat" class="form-label">Syarat</label>
                    {{-- <input class="form-control @error('syarat') is-invalid @enderror" value="{{ old('syarat') }}"
                        type="text" id="syarat" name="syarat[]" placeholder="sebelum/sesudah makan" /> --}}
                    <select class="form-control @error('syarat') is-invalid @enderror" name="syarat[]"
                        style="width: 100%">
                        <option value="">--</option>
                        <option value="sebelum">sebelum</option>
                        <option value="sesudah">sesudah</option>
                        <option value="sebelum&sesudah">sebelum dan sesudah</option>
                    </select>
                    @error('syarat')
                        <div class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-sm btn-outline-primary" id="add-input" accesskey="=">+</a>
                <a class="btn btn-sm btn-outline-primary" id="remove-input" accesskey="-">-</a>
            </div>
        </div>
    </div>

    <h5 class="card-header">Keterangan</h5>
    <div class="card-body">
        <div class="row">
            <div class="mb-3 col-md-12">
                {{-- <label for="labor" class="form-label">Laboratorium</label> --}}
                <textarea class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}" type="text"
                    id="keterangan" name="keterangan" placeholder=""></textarea>
                @error('keterangan')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="card-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
