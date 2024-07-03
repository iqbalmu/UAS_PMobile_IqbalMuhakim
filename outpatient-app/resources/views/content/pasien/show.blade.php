@extends('layouts.main')

@section('title', 'Data Pasien')

@section('header', 'Detail Data Pasien')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card mb-4">
                <h5 class="card-header">Data Pasien</h5>

                <div class="card-body">
                    <div class="row">
                        <div class="mb-3">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ '/uploads/pasien/' . $pasien->pasien->image_profile }}" alt="user-avatar"
                                    class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            </div>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="mrn" class="form-label">MRN</label>
                            <input class="form-control" value="{{ $pasien->pasien->mrn }}" type="text" id="mrn"
                                name="mrn" disabled />
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="nik" class="form-label">NIK</label>
                            <input class="form-control" type="text" id="nik" name="nik"
                                placeholder="11232321321241231" value="{{ $pasien->pasien->nik }}" disabled />
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="bpjs" class="form-label">No BPJS</label>
                            <input class="form-control" type="text" id="bpjs" name="bpjs"
                                placeholder="11232321321241231" value="{{ $pasien->pasien->bpjs }}" disabled />
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input class="form-control" value="{{ $pasien->nama }}" type="text" id="nama"
                                name="nama" placeholder="John" disabled />
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <input class="form-control"
                                value="{{ $pasien->pasien->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}"
                                type="text" id="nama" name="nama" placeholder="John" disabled />
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="text" id="email" name="email"
                                placeholder="john.doe@example.com" value="{{ $pasien->email }}" disabled />
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="nomor_hp">Nomor HP</label>
                            <input type="text" id="nomor_hp" name="nomor_hp"
                                class="form-control
                                    placeholder="0821 9650 6900"
                                disabled value="{{ $pasien->nomor_hp }}" />
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="profesi" class="form-label">Profesi</label>
                            <input class="form-control" type="text" id="profesi" name="profesi" placeholder="Mahasiswa"
                                value="{{ $pasien->pasien->profesi }}" disabled />
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Jl. jalan"
                                value="{{ $pasien->pasien->alamat }}" disabled />
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="d-flex gap-1">
                        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Back</a>
                        @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2)
                            <a href="{{ route('pasien.edit', $pasien->id_user) }}" class="btn btn-primary">Edit</a>
                            <button type="button" class="btn btn-outline-danger ms-auto" data-bs-toggle="modal"
                                data-bs-target="#modalDeletePasien">
                                Delete
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card mb-4">
                <h5 class="card-header">Rekam Medik</h5>
                <div class="card-body">
                    <div class="demo-inline-spacing">
                        <div class="list-group list-group-flush">
                            @foreach ($rekamMediks as $mrn)
                                <a href="{{ route('pasien.mrn', ['userId' => $pasien->id_user, 'mrnId' => $mrn->id_rekam_medik]) }}"
                                    class="list-group-item list-group-item-action">
                                    {{ $loop->iteration }} ) {{ $mrn->mrn }}-{{ $mrn->id_rekam_medik }}
                                    {{ $mrn->created_at }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('content.pasien.modal.delete')
@endsection
