@extends('layouts.main')

@section('title', 'Detail Obat')

@section('header', 'Detail Obat')

@section('content')
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Detail Data Obat</h5>
                    <small class="text-muted float-end">ID: {{ $data->id_obat }}</small>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nama">nama obat</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $data->nama }}" placeholder="nama obat" aria-label="nama obat"
                                        aria-describedby="nama obat" readonly disabled />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="penyedia">penyedia</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <select class="form-select" id="penyedia" name="penyedia" required disabled>
                                        <option selected value="{{ $data->penyedia }}">{{ $data->penyedia }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="kategori">kategori</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <select class="form-select" id="kategori" name="kategori" required disabled>
                                        <option selected value="{{ $data->kategori }}">{{ $data->kategori }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="harga">Harga</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="number" id="harga" class="form-control" name="harga" readonly
                                        disabled value="{{ $data->harga }}" placeholder="9099" aria-label="9099"
                                        aria-describedby="harga" min="1" required />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="stok">Stok</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="number" id="stok" class="form-control" name="stok"
                                        placeholder="160" aria-label="160" aria-describedby="stok" min="1" required
                                        readonly disabled value="{{ $data->stok }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="kadaluarsa">Kadaluarsa</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="date" id="kadaluarsa" name="kadaluarsa" required
                                        readonly disabled value="{{ $data->kadaluarsa }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="keterangan">Keterangan</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <textarea id="keterangan" class="form-control" name="keterangan" placeholder="keterangan obat"
                                        aria-label="keterangan obat" aria-describedby="keterangan" disabled>{{ $data->keterangan }}
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <a href="{{ route('obat.edit', $data->id_obat) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('obat.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
