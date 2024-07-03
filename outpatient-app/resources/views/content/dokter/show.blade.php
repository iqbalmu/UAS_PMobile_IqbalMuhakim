@extends('layouts.main')

@section('title', 'Dokter')

@section('header', 'Update Data Dokter')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{ '/uploads/dokter/' . $dokter->dokter->foto }}" alt="user-avatar" class="d-block rounded"
                            height="100" width="100" id="uploadedAvatar" />
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-secondary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="upload" class="account-file-input" hidden
                                    accept="image/png, image/jpeg" name="foto" disabled />
                            </label>
                            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4"
                                id="imageReset" disabled>
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>

                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            @error('foto')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr class="my-0" />
                <h5 class="card-header">Account</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama', $dokter->nama) }}" type="text" id="nama" name="nama"
                                placeholder="Doe" disabled />
                            @error('nama')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-password-toggle mb-3 col-md-6">
                            <label class="form-label" for="basic-default-password32">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="basic-default-password32" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="basic-default-password" disabled />
                                <span class="input-group-text cursor-pointer" id="basic-default-password"><i
                                        class="bx bx-hide"></i></span>
                            </div>
                            @error('password')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" id="email"
                                name="email" placeholder="john.doe@example.com" value="{{ old('email', $dokter->email) }}"
                                disabled />
                            @error('email')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="nomor_hp">Nomor HP</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">ID (+62)</span>
                                <input type="text" id="nomor_hp" name="nomor_hp"
                                    class="form-control
                                    @error('nomor_hp') is-invalid @enderror"
                                    placeholder="0821 9650 6900" value="{{ old('nomor_hp', $dokter->nomor_hp) }}"
                                    disabled />
                            </div>
                            @error('nomor_hp')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h5 class="card-header">Profile</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="nomor_str" class="form-label">Nomor STR</label>
                            <input class="form-control @error('nomor_str') is-invalid @enderror" type="text"
                                id="nomor_str" name="nomor_str" placeholder="11232321321241231"
                                value="{{ old('nomor_str', $dokter->dokter->nomor_str) }}" disabled />
                            @error('nomor_str')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="nomor_sip" class="form-label">Nomor SIP</label>
                            <input class="form-control @error('nomor_sip') is-invalid @enderror" type="text"
                                id="nomor_sip" name="nomor_sip" placeholder="11232321321241231"
                                value="{{ old('nomor_sip', $dokter->dokter->nomor_sip) }}" disabled />
                            @error('nomor_sip')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="poli" class="form-label">Poli</label>
                            <select name="poli_id" id="poli_id" class="form-control" disabled>
                                <option value="{{ $dokter->dokter->poli_id }}">{{ $dokter->dokter->poli->nama }}</option>
                            </select>
                            @error('poli_id')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="spesialisasi" class="form-label">Spesialisasi</label>
                            <input class="form-control @error('spesialisasi') is-invalid @enderror" type="text"
                                name="spesialisasi" id="spesialisasi" placeholder="Bedah Otak"
                                value="{{ old('spesialisasi', $dokter->dokter->spesialisasi) }}" disabled />
                            @error('spesialisasi')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-2 d-flex">
                        <div>
                            <a href="{{ route('dokter.index') }}" class="btn btn-outline-secondary">Back</a>
                            @if (Auth::user()->role_id === 1)
                                <a href="{{ route('dokter.edit', $dokter->id_user) }}"
                                    class="btn btn-primary me-2">Edit</a>
                            @endif
                        </div>
                        @if (Auth::user()->role_id === 1)
                            <button type="button" class="btn btn-outline-danger ms-auto" data-bs-toggle="modal"
                                data-bs-target="#modalDeleteDokter" data-id={{ $dokter->id_user }}>
                                Delete
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('content.dokter.modal.delete')

@endsection
