@extends('layouts.main')

@section('title', 'Diagnosa')

@section('header', 'Diagnosa Pasien')

@section('vendor-styles')
    <link href="/assets/vendor/libs/select2/select2.min.css" rel="stylesheet" />
    <link href="/assets/vendor/libs/select2/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
@endsection

@section('vendor-scripts')
    <script src="/assets/vendor/libs/select2/select2.min.js"></script>
@endsection

@section('page-scripts')
    <script src="/assets/js/diagnosa.js"></script>
@endsection

@section('content')
    <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-kesehatan-tab" data-bs-toggle="pill" data-bs-target="#pills-kesehatan"
                type="button" role="tab" aria-controls="pills-kesehatan" aria-selected="true" accesskey="r">Riwayat &
                Keluhan [R]</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-pemeriksaan-tab" data-bs-toggle="pill" data-bs-target="#pills-pemeriksaan"
                type="button" role="tab" aria-controls="pills-pemeriksaan" aria-selected="false" accesskey="p">
                Pemeriksaan [P]</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-diagnosa-tab" data-bs-toggle="pill" data-bs-target="#pills-diagnosa"
                type="button" role="tab" aria-controls="pills-diagnosa" aria-selected="false" accesskey="g">Diagnosa
                [G]</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-obat-tab" data-bs-toggle="pill" data-bs-target="#pills-obat" type="button"
                role="tab" aria-controls="pills-obat" aria-selected="false" accesskey="o">Obat [O]</button>
        </li>
    </ul>
    <form
        action="/antrian/{{ $antrian }}?poli_id={{ $poli }}&mrn={{ $mrn }}&tanggal={{ $tanggal }}"
        method="post">
        @csrf
        <div class="tab-content p-0" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-kesehatan" role="tabpanel"
                aria-labelledby="pills-kesehatan-tab" tabindex="0">
                @include('content.diagnosa.forms.kesehatan')
            </div>

            <div class="tab-pane fade" id="pills-pemeriksaan" role="tabpanel" aria-labelledby="pills-pemeriksaan-tab"
                tabindex="0">
                @include('content.diagnosa.forms.pemeriksaan')
            </div>
            <div class="tab-pane fade" id="pills-diagnosa" role="tabpanel" aria-labelledby="pills-diagnosa-tab"
                tabindex="0">
                @include('content.diagnosa.forms.diagnosa')
            </div>
            <div class="tab-pane fade" id="pills-obat" role="tabpanel" aria-labelledby="pills-obat-tab" tabindex="0">
                @include('content.diagnosa.forms.obat')
            </div>
        </div>
    </form>
@endsection
