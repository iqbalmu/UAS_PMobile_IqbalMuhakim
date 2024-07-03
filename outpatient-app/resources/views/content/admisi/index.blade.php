@extends('layouts.main')

@section('title', 'Data Admisi')

@section('header', 'Data Admisi')

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
                    <th>#</th>
                    <th>Nama</th>
                    <th>email</th>
                    <th>nomor hp</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $user->nama }}
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->nomor_hp }}</td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                                        class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('admisi.show', $user->id_user) }}"><i
                                            class="bx bx-show-alt me-1"></i>Detail</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
