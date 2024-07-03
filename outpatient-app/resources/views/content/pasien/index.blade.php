@extends('layouts.main')

@section('title', 'Data Pasien')

@section('header', 'Data Pasien')

@section('vendor-styles')
    <link href="/assets/vendor/libs/datatables/datatables.min.css" rel="stylesheet">
@endsection

@section('vendor-scripts')
    <script src="/assets/vendor/libs/datatables/datatables.min.js"></script>
@endsection

@section('page-scripts')
    <script src="/assets/js/data-tables.js"></script>
@endsection

@section('content')
    <div class="card p-4">
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th>No Rekam Medis</th>
                    <th>nama</th>
                    <th>profesi</th>
                    <th>jenis kelamin</th>
                    <th class="text-center">kontak</th>
                    <th class="text-center">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                    <tr>
                        <td>
                            {{ $user->pasien->mrn }}
                        </td>
                        <td>
                            {{ $user->nama }}
                        </td>
                        <td>
                            {{ $user->pasien->profesi }}
                        </td>
                        <td>
                            {{ $user->pasien->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                        </td>
                        <td class="text-center">
                            {{ $user->nomor_hp }}
                        </td>
                        <td class="text-center">
                            <a class="" href="{{ route('pasien.show', $user->id_user) }}"><i
                                class="bx bx-show-alt me-1"></i>Detail</a>
                            {{-- <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('pasien.show', $user->id_user) }}"><i
                                            class="bx bx-show-alt me-1"></i>Detail</a>
                                    <a class="dropdown-item" href="{{ route('pasien.edit', $user->id_user) }}"><i
                                            class="bx bx-edit-alt me-1"></i>Edit</a>
                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#obatModal" data-obat-id={{ $user->id_user }}
                                        data-obat-name={{ $user->nama }}>
                                        <i class="bx bx-trash me-1"></i>Delete
                                    </button>
                                </div>
                            </div> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
