@extends('layouts.main')

@section('title', 'Praktek Dokter')

@section('header', 'Jadwal Praktek Dokter')

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
    <script src="/assets/js/jadwal-praktek.js"></script>
@endsection

@section('content')
    <!-- Modal Jadwal Create -->
    @include('content.jadwal-praktek.modal.create')

    <!-- Modal Jadwal Edit -->
    @include('content.jadwal-praktek.modal.edit')

    <!-- Modal Delete Jadwal-->
    @include('content.jadwal-praktek.modal.delete')

    <div class="card p-4">
        @if (auth()->user()->role_id === 2)
            <div class="mb-3 d-flex">
                <button type="button" class="btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalJadwal">
                    <span class="tf-icons bx bx-pie-chart-alt me-1"></span>Buat Jadwal
                </button>
            </div>
        @endif

        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th>spesialis</th>
                    <th>dokter</th>
                    <th>hari</th>
                    <th>jam</th>
                    @if (auth()->user()->role_id === 2)
                        <th>action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $jadwal)
                    <tr>
                        <td>{{ $jadwal->dokter->user->dokter->spesialisasi }}</td>
                        <td>{{ $jadwal->dokter->user->nama }}</td>
                        <td>{{ $jadwal->hari }}</td>
                        <td>{{ substr($jadwal->startTime, 0, 5) }} - {{ substr($jadwal->endTime, 0, 5) }}</td>
                        @if (auth()->user()->role_id === 2)
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        {{-- <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i>Edit</a> --}}
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modalEditJadwal" data-jadwal-id="{{ $jadwal->id_jadwal }}"
                                            data-dokter-id="{{ $jadwal->dokter->id_dokter }}"
                                            data-dokter-name="{{ $jadwal->dokter->user->nama }}"
                                            data-hari="{{ $jadwal->hari }}" data-start-time="{{ $jadwal->startTime }}"
                                            data-end-time="{{ $jadwal->endTime }}">
                                            <i class="bx bx-edit-alt me-1"></i>Edit
                                        </button>
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteJadwal" data-jadwal-id="{{ $jadwal->id_jadwal }}">
                                            <i class="bx bx-trash me-1"></i>Delete
                                        </button>
                                    </div>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
