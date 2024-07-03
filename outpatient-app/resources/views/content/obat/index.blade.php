@extends('layouts.main')

@section('title', 'Obat')

@section('header', 'Data Obat')

@section('vendor-styles')
    <link href="/assets/vendor/libs/datatables/datatables.min.css" rel="stylesheet">
@endsection

@section('vendor-scripts')
    <script src="/assets/vendor/libs/datatables/datatables.min.js"></script>
@endsection

@section('page-scripts')
    <script src="/assets/js/data-tables.js"></script>
    <script src="/assets/js/obat.js"></script>
@endsection

@section('content')

    <!-- Modal Delete Obat-->
    @include('content.obat.modal.delete')

    <div class="card p-4">
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>nama</th>
                    <th>kategori</th>
                    <th>harga</th>
                    <th>stok</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $obat)
                    <tr>
                        <td>
                            {{ $obat->id_obat }}
                        </td>
                        <td>
                            {{ $obat->nama }}
                        </td>
                        <td>
                            {{ $obat->kategori }}
                        </td>
                        <td>
                            Rp. {{ number_format($obat->harga) }}
                        </td>
                        <td>
                            <span
                                class="badge
                                @if ($obat->stok == 'tersedia') bg-success
                                @else bg-secondary @endif">
                                {{ $obat->stok }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                                        class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('obat.show', $obat->id_obat) }}"><i
                                            class="bx bx-show-alt me-1"></i>Detail</a>
                                    <a class="dropdown-item" href="{{ route('obat.edit', $obat->id_obat) }}"><i
                                            class="bx bx-edit-alt me-1"></i>Edit</a>
                                    {{-- <a class="dropdown-item" href="/obat/delete"><i class="bx bx-trash me-1"></i>Delete</a> --}}
                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#obatModal" data-obat-id={{ $obat->id_obat }}
                                        data-obat-name={{ $obat->nama }}>
                                        <i class="bx bx-trash me-1"></i>Delete
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
