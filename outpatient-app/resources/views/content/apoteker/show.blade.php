@extends('layouts.main')

@section('title', 'Dokter')

@section('header', 'Update Data Dokter')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Account</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama', $user->nama) }}" type="text" id="nama" name="nama"
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
                                name="email" placeholder="john.doe@example.com" value="{{ old('email', $user->email) }}"
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
                                    placeholder="0821 9650 6900" value="{{ old('nomor_hp', $user->nomor_hp) }}" disabled />
                            </div>
                            @error('nomor_hp')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-2 d-flex">
                        <div>
                            <a href="{{ route('apoteker.edit', $user->id_user) }}" class="btn btn-primary me-2">Edit</a>
                            <a href="{{ route('apoteker.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>

                        <button type="button" class="btn btn-outline-danger ms-auto" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteApoteker">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('content.apoteker.modal.delete')
@endsection
