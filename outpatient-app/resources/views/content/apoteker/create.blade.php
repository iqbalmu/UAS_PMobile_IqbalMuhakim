@extends('layouts.main')

@section('title', 'Apoteker Baru')

@section('header', 'Form Apoteker Baru')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <form action="{{ route('apoteker.store') }}" method="post">
                    @csrf
                    <h5 class="card-header">Account</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}"
                                    type="text" id="nama" name="nama" placeholder="Doe" />
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
                                        aria-describedby="basic-default-password" />
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
                                <input class="form-control @error('email') is-invalid @enderror" type="text"
                                    id="email" name="email" placeholder="john.doe@example.com"
                                    value="{{ old('email') }}" />
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
                                        placeholder="0821 9650 6900" value="{{ old('nomor_hp') }}" />
                                </div>
                                @error('nomor_hp')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <a href="{{ route('apoteker.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
