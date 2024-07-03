@extends('layouts.main')

@section('title', 'Tebus Obat')

@section('header', 'Tebus Obat Pasien')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <form action="" method="get">
                    <div class="card-body d-flex gap-2">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                            <input type="text" class="form-control" placeholder="Nomor Rekam Medik"
                                aria-label="Search..." aria-describedby="basic-addon-search31" name="mrn" autofocus>
                        </div>
                        <button type="submit" class="btn btn-icon btn-primary">
                            <span class="tf-icons bx bx-search"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @if ($reseps)

            <div class="col-md-8">
                <div class="accordion" id="accordionExample">
                    @foreach ($reseps as $resep)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#{{ $resep->kode }}" aria-expanded="true"
                                    aria-controls="{{ $resep->kode }}">
                                    {{ $resep->kode }}
                                </button>
                            </h2>
                            <div id="{{ $resep->kode }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="list-group list-group-flush">
                                        @if ($resep->rmedik->pembayaran->status === 'lunas')
                                            @foreach ($resep->details as $obat)
                                                <span class="fw-semibold">
                                                    {{ $obat->obat->nama }}
                                                    {{ $obat->dosis }}</span>
                                                <p class="list-group-item list-group-item-action">
                                                    <span>
                                                        {{ $obat->metode }} {{ $obat->frekuensi }} hari, {{ $obat->syarat }}
                                                        makan,
                                                        {{ $obat->durasi }}
                                                    </span>
                                                </p>
                                            @endforeach

                                            <span class="fw-semibold">
                                                Keterangan :
                                            </span>
                                            <p class="list-group-item list-group-item-action">
                                                <span>
                                                    {{ $resep->keterangan }}
                                                </span>
                                            </p>
                                        @endif

                                        <span class="fw-semibold">
                                            Status :
                                        </span>
                                        <p class="list-group-item list-group-item-action">
                                            <span>
                                                {{ $resep->rmedik->pembayaran->status }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
