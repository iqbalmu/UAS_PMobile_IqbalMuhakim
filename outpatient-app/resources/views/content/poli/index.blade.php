@extends('layouts.main')

@section('title', 'Poliklinik')

@section('header', 'Data Poliklinik')

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
    <script src="/assets/js/poli.js"></script>
@endsection

@section('content')
    <!-- Modal Jadwal Create -->
    @include('content.poli.modal.create')

    <!-- Modal Jadwal Edit -->
    @include('content.poli.modal.edit')

    <!-- Modal Delete Jadwal-->
    @include('content.poli.modal.delete')

    <div class="card p-4">
        @if (auth()->user()->role_id === 2 || auth()->user()->role_id === 1)
            <div class="mb-3 d-flex">
                <button type="button" class="btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPoli">
                    <span class="tf-icons bx bx-pie-chart-alt me-1"></span>Tambah Data
                </button>
            </div>
        @endif

        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th>nama</th>
                    <th>deskripsi</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td style="width: 20%">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalEditPoli" data-id="{{ $item->id_poli }}"
                                data-nama="{{ $item->nama }}" data-deskripsi="{{ $item->deskripsi }}">
                                edit
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modalDeletePoli" data-id={{ $item->id_poli }}>
                                delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
