@extends('layouts.main')

@section('title', 'Rekam Medik')

@section('header', 'Rekam Medik Pasien')

@section('content')

    <div class="row mb-3">
        <div class="col-md-7">
            <div class="card mb-3">
                <h5 class="card-header">
                    Medik
                </h5>
                <div class="card-body">
                    <div class="demo-inline-spacing">
                        <div class="list-group list-group-flush">
                            <span class="text-muted small">MRN :</span>
                            <p class="list-group-item list-group-item-action">
                                <span>{{ $rMedik->mrn ?: '-' }}</span>
                            </p>
                            <span class="text-muted small">Keluhan Utama :</span>
                            <p class="list-group-item list-group-item-action">
                                <span>{{ $rMedik->keluhan_utama ?: '-' }}</span>
                            </p>
                            <span class="text-muted small">Riwayat Kesehatan :</span>
                            <p class="list-group-item list-group-item-action">
                                <span>{{ $rMedik->riwayat_kesehatan ?: '-' }}</span>
                            </p>
                            <span class="text-muted small">Riwayat Obat :</span>
                            <p class="list-group-item list-group-item-action">
                                <span>{{ $rMedik->riwayat_obat ?: '-' }}</span>
                            </p>
                            <span class="text-muted small">Diagnosis :</span>
                            <p class="list-group-item list-group-item-action">
                                <span>{{ $rMedik->diagnosis ?: '-' }}</span>
                            </p>
                            <span class="text-muted small">Penatalaksanaan :</span>
                            <p class="list-group-item list-group-item-action">
                                <span>{{ $rMedik->penatalaksanaan ?: '-' }}</span>
                            </p>
                            <span class="text-muted small">Catatan Dokter :</span>
                            <p class="list-group-item list-group-item-action">
                                <span>{{ $rMedik->catatan_dokter ?: '-' }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header">
                    Pemeriksaan
                </h5>
                <div class="card-body">
                    <div class="demo-inline-spacing">
                        <div class="list-group list-group-flush">
                            <div class="d-flex">
                                <span class="text-muted small w-50">Tinggi Badan :</span>
                                <span class="text-muted small w-50">Berat Badan :</span>
                            </div>
                            <p class="list-group-item list-group-item-action d-flex">
                                <span class="w-50">{{ $rMedik->pemeriksaan->tinggi ?: '-' }}</span>
                                <span class="w-50 ps-3">{{ $rMedik->pemeriksaan->berat ?: '-' }}</span>
                            </p>

                            <div class="d-flex">
                                <span class="text-muted small w-50">Tekanan Darah :</span>
                                <span class="text-muted small w-50">Pernapasan :</span>
                            </div>
                            <p class="list-group-item list-group-item-action d-flex">
                                <span class="w-50">{{ $rMedik->pemeriksaan->tekanan_darah ?: '-' }}</span>
                                <span class="w-50 ps-3">{{ $rMedik->pemeriksaan->pernapasan ?: '-' }}</span>
                            </p>

                            <div class="d-flex">
                                <span class="text-muted small w-50">suhu :</span>
                                <span class="text-muted small w-50">Nadi :</span>
                            </div>
                            <p class="list-group-item list-group-item-action d-flex">
                                <span class="w-50">{{ $rMedik->pemeriksaan->suhu ?: '-' }}</span>
                                <span class="w-50 ps-3">{{ $rMedik->pemeriksaan->nadi ?: '-' }}</span>
                            </p>

                            <span class="text-muted small">Laboratorium :</span>
                            <p class="list-group-item list-group-item-action">
                                <span>{{ $rMedik->pemeriksaan->laboratorium ?: '-' }}</span>
                            </p>
                            <span class="text-muted small">Rontgen :</span>
                            <p class="list-group-item list-group-item-action">
                                <span>{{ $rMedik->pemeriksaan->rontgen ?: '-' }}</span>
                            </p>
                            <span class="text-muted small">CTScan :</span>
                            <p class="list-group-item list-group-item-action">
                                <span>{{ $rMedik->pemeriksaan->ctscan ?: '-' }}</span>
                            </p>
                            <span class="text-muted small">USG :</span>
                            <p class="list-group-item list-group-item-action">
                                <span>{{ $rMedik->pemeriksaan->usg ?: '-' }}</span>
                            </p>
                            <span class="text-muted small">MRI :</span>
                            <p class="list-group-item list-group-item-action">
                                <span>{{ $rMedik->pemeriksaan->mri ?: '-' }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card mb-3">
                <h5 class="card-header">
                    Dokter
                </h5>
                <div class="card-body">
                    <div class="demo-inline-spacing">
                        <div class="list-group list-group-flush">
                            <span class="text-muted small">Nomor STR :</span>
                            <p class="list-group-item list-group-item-action">
                                <span>{{ $rMedik->dokter->nomor_str ?: '-' }}</span>
                            </p>
                            <span class="text-muted small">Nomor SIP :</span>
                            <p class="list-group-item list-group-item-action">
                                <span>{{ $rMedik->dokter->nomor_sip ?: '-' }}</span>
                            </p>
                            <span class="text-muted small">Nama Dokter :</span>
                            <p class="list-group-item list-group-item-action">
                                <span>{{ $rMedik->dokter->user->nama ?: '-' }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <h5 class="card-header d-flex align-items-center justify-content-between">
                    Resep
                    <small>
                        {{ $rMedik->resep->kode }}
                    </small>
                </h5>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @foreach ($rMedik->resep->details as $obat)
                            <span class="fw-semibold">
                                {{ $obat->obat->nama }}
                                {{ $obat->dosis }}</span>
                            <p class="list-group-item list-group-item-action">
                                <span>
                                    {{ $obat->metode }} {{ $obat->frekuensi }} hari, {{ $obat->syarat }} makan,
                                    {{ $obat->durasi }}
                                </span>
                            </p>
                        @endforeach

                        <span class="fw-semibold">
                            Keterangan :
                        </span>
                        <p class="list-group-item list-group-item-action">
                            <span>
                                {{ $rMedik->resep->keterangan }}
                            </span>
                        </p>

                        <span class="fw-semibold">
                            Status :
                        </span>
                        <p class="list-group-item list-group-item-action">
                            <span>
                                {{ $rMedik->resep->status }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
