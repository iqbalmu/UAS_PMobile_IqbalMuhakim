@extends('layouts.main')

@section('title', 'Antrian')

@section('header', 'Antrian Pasien')

@section('vendor-styles')
    {{-- <link href="/assets/vendor/libs/datatables/datatables.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('vendor-scripts')
    {{-- <script src="/assets/vendor/libs/datatables/datatables.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('page-scripts')
    <script src="/assets/js/data-tables.js"></script>
    <script src="/assets/js/antrian.js"></script>
@endsection

@section('content')

    <!-- Modal Create -->
    @include('content.antrian.modal.create')

    <!-- Modal Update Status -->
    @include('content.antrian.modal.edit')

    <div class="card p-4">
        <div class="mb-3 d-flex justify-content-between">
            <form action="{{ route('antrian.index') }}" method="get" id="form-filter">
                {{-- @csrf --}}
                <div class="row">
                    <div class="col">
                        <input type="date" name="tanggal" id="filter-tanggal" class="form-control w-100"
                            value="{{ $tanggal }}">
                    </div>
                    <div class="col">
                        <select name="poli_id" id="filter-poli" class="form-select">
                            <option value="">poli</option>
                            {{-- <option value="" selected>123</option> --}}
                            @foreach ($polis as $poli)
                                <option value="{{ $poli->id_poli }}" @if ($poli->id_poli == $poli_id) selected @endif>
                                    {{ $poli->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>

            @if (auth()->user()->role_id === 2)
                <button type="button" class="btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAntrian">
                    <span class="tf-icons bx bx-pie-chart-alt me-1"></span>Antrian Baru
                </button>
            @endif
        </div>

        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Pasien</th>
                    <th>Poli</th>
                    <th>status</th>
                    <th>tanggal</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($antrian) --}}
                @foreach ($antrian as $item)
                    <tr>
                        <td>
                            {{ $item->nomor }}
                        </td>
                        <td>
                            {{ $item->pasien->user->nama }}
                        </td>
                        <td>
                            {{ $item->poli->nama }}
                        </td>
                        <td>
                            <span
                                class="badge
                                @if ($item->status == 'menunggu') bg-secondary
                                @elseif($item->status == 'proses') bg-warning
                                @else bg-success @endif">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td>
                            {{ $item->tanggal }}
                        </td>
                        <td>
                            @if (auth()->user()->role_id === 3)
                                @if ($item->status === 'selesai')
                                    <button class="btn btn-sm btn-primary" disabled>Diagnosa</button>
                                @else
                                    <a href="/antrian/{{ $item->nomor }}?poli_id={{ $item->poli->id_poli }}&mrn={{ $item->pasien->mrn }}&tanggal={{ $item->tanggal }}"
                                        class="btn btn-sm btn-primary">
                                        Diagnosa
                                    </a>
                                @endif
                            @else
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalUpdateStatus" data-antrian-id={{ $item->id_antrian }}
                                    data-nama-pasien={{ $item->pasien->user->nama }} data-status={{ $item->status }}
                                    @if ($item->status === 'selesai') disabled @endif>
                                    Update Status
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
