@extends('layouts.main')

@section('title', 'Janji Temu')

@section('header', 'Antrian Janji Temu')

@section('vendor-styles')
    <link href="/assets/vendor/libs/datatables/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('vendor-scripts')
    <script src="/assets/vendor/libs/datatables/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('page-scripts')
    <script src="/assets/js/data-tables.js"></script>
    <script src="/assets/js/janji-temu.js"></script>
@endsection

@section('content')

    <!-- Modal Create-->
    @include('content.janji-temu.modal.create')

    <!-- Modal Edit -->
    @include('content.janji-temu.modal.edit')

    <div class="card p-4">
        @if (auth()->user()->role_id === 3)
            <div class="mb-3 d-flex">
                <button type="button" class="btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTemu">
                    <span class="tf-icons bx bx-pie-chart-alt me-1"></span>Janji Temu Baru
                </button>
            </div>
        @endif

        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th>Antrian</th>
                    <th>Pasien</th>
                    <th>Dokter</th>
                    <th>Waktu</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($data) --}}
                @foreach ($data as $kunjungan)
                    <tr>
                        <td>{{ $kunjungan->id_kunjungan }}</td>
                        <td>{{ $kunjungan->pasien->user->nama }}</td>
                        <td>{{ $kunjungan->dokter->user->nama }}</td>
                        <td>{{ $kunjungan->tanggal }} : {{ $kunjungan->waktu }}</td>
                        <td>
                            <span
                                class="badge
                            @if ($kunjungan->status == 'menunggu') bg-secondary
                            @elseif($kunjungan->status == 'proses') bg-warning
                            @else bg-success @endif">
                                {{ $kunjungan->status }}
                            </span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalUpdateStatusTemu" data-antrian-id={{ $kunjungan->id_kunjungan }}
                                data-nama-pasien={{ $kunjungan->pasien->user->nama }}
                                data-nama-dokter={{ $kunjungan->dokter->user->nama }} data-status={{ $kunjungan->status }}>
                                Update
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
