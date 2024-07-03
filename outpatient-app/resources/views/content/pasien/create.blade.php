@extends('layouts.main')

@section('title', 'Pasien Baru')

@section('header', 'Form Pasien Baru')

@section('page-scripts')
    <script src="/assets/js/image-upload.js"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <form action="{{ route('pasien.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="/assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100"
                                width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" name="image_profile" />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4"
                                    id="imageReset">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                @error('image_profile')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <h5 class="card-header">Pasien</h5>
                    <div class="card-body">
                        <div class="row">
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
                                <label for="nik" class="form-label">NIK</label>
                                <input class="form-control @error('nik') is-invalid @enderror" type="text" id="nik"
                                    name="nik" placeholder="11232321321241231" value="{{ old('nik') }}" />
                                @error('nik')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="bpjs" class="form-label">No BPJS</label>
                                <input class="form-control @error('bpjs') is-invalid @enderror" type="text" id="bpjs"
                                    name="bpjs" placeholder="11232321321241231" value="{{ old('bpjs') }}" />
                                @error('bpjs')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="">--</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="profesi" class="form-label">Profesi</label>
                                <input class="form-control @error('profesi') is-invalid @enderror" type="text"
                                    name="profesi" id="profesi" placeholder="Programmer" value="{{ old('profesi') }}" />
                                @error('profesi')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input class="form-control @error('alamat') is-invalid @enderror" type="text"
                                    name="alamat" id="alamat" placeholder="Jl. keselamatan" value="{{ old('alamat') }}" />
                                @error('alamat')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="{{ route('pasien.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
