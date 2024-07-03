@extends('layouts.main')

@section('title', 'Pembayaran')

@section('header', 'Data Pembayaran')

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
    <script src="/assets/js/pembayaran.js"></script>
@endsection

@section('content')

    <!-- Modal Update Status -->
    @include('content.pembayaran.modal.edit')

    <div class="card p-4">
        <div class="mb-3 d-flex justify-content-between">
            <form action="{{ route('pembayaran.index') }}" method="get" id="form-filter">
                {{-- @csrf --}}
                <div class="row">
                    <div class="col">
                        <input type="date" name="tanggal" id="filter-tanggal" class="form-control w-100"
                            value="{{ $tanggal }}">
                    </div>
                </div>
            </form>
        </div>

        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>tanggal</th>
                    <th>MRN-ID</th>
                    <th>nama</th>
                    <th>total harga</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->created_at->format('Y-m-d') }}</td>
                        <td>{{ $item->rmedik->mrn }}-{{ $item->rmedik->id_rekam_medik }}</td>
                        <td>{{ $item->rmedik->pasien->user->nama }}</td>
                        <td>
                            Rp. {{ number_format($item->total_harga) }}
                        </td>
                        <td>
                            <span
                                class="badge
                                @if ($item->status == 'lunas') bg-success
                                @else bg-warning @endif">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalPembayaran" data-mrn={{ $item->rmedik->mrn }}
                                data-harga={{ $item->total_harga }} data-id={{ $item->id_pembayaran }}
                                @if ($item->status === 'lunas') disabled @endif>
                                Proses Pembayaran
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
