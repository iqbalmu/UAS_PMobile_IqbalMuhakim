@extends('layouts.main')

@section('title', 'Obat')

@section('header', 'Input Obat Baru')

@section('content')
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Form Data Obat</h5>
                    <small class="text-muted float-end">obat masuk</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('obat.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nama">nama obat</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="nama obat" aria-label="nama obat" aria-describedby="nama obat" required
                                        autofocus />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="penyedia">penyedia</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <select class="form-select" id="penyedia" name="penyedia" required>
                                        <option selected value="">---</option>
                                        @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor }}">{{ $vendor }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="kategori">kategori</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <select class="form-select" id="kategori" name="kategori" required>
                                        <option selected value="">---</option>
                                        <option value="Obat Bebas (OB)">Obat Bebas (OB)</option>
                                        <option value="Obat Bebas Terbatas (OBT)">Obat Bebas Terbatas (OBT)</option>
                                        <option value="Obat Keras (OK)">Obat Keras (OK)</option>
                                        <option value="Narkotika, Psikotropika, Prekursor (NPP)">Narkotika, Psikotropika,
                                            Prekursor (NPP)</option>
                                        <option value="Obat Herbal Terstandar (OHT)">Obat Herbal Terstandar (OHT)</option>
                                        <option value="Obat Generik">Obat Generik</option>
                                        <option value="Alat Kesehatan (ALKES)">Alat Kesehatan (ALKES)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="harga">Harga</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="number" id="harga" class="form-control" name="harga"
                                        placeholder="9099" aria-label="9099" aria-describedby="harga" min="1"
                                        required />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="stok">Stok</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    {{-- <input type="number" id="stok" class="form-control" name="stok"
                                        placeholder="160" aria-label="160" aria-describedby="stok" min="1"
                                        required /> --}}
                                    <select name="stok" id="stok" class="form-control">
                                        <option value="tersedia">tersedia</option>
                                        <option value="kosong">kosong</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="kadaluarsa">Kadaluarsa</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="date" id="kadaluarsa" name="kadaluarsa" required />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="keterangan">Keterangan</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <textarea id="keterangan" class="form-control" name="keterangan" placeholder="keterangan obat"
                                        aria-label="keterangan obat" aria-describedby="keterangan"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
