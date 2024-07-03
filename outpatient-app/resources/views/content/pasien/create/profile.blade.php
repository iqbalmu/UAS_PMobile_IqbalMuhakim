@extends('layouts.main')

@section('title', 'Pasien')

@section('header', 'Pendaftaran Pasien Baru')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('content.pasien.create.navbar')

            <div class="card mb-4">
                <h5 class="card-header">Create Profile</h5>
                <!-- Form Profile -->
                <div class="card-body">
                    <form action="{{ route('pasien.create.profile') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="pasien" class="form-label">Pasien</label>
                                <select id="pasien" class="select2 form-select @error('user_id') is-invalid @enderror"
                                    name="user_id" autofocus>
                                    <option value="">Select Pasien</option>
                                    @foreach ($pasiens as $pasien)
                                        <option value="{{ $pasien->id_user }}">
                                            {{ $pasien->nama }} ( {{ $pasien->email }} )
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3 col-md-6">
                                <label for="tinggi_badan" class="form-label">Tinggi Badan</label>
                                <input class="form-control @error('tinggi_badan') is-invalid @enderror" type="number"
                                    name="tinggi_badan" id="tinggi_badan" placeholder="175"
                                    value="{{ old('tinggi_badan') }}" />
                                @error('tinggi_badan')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="berat_badan" class="form-label">Berat Badan</label>
                                <input class="form-control @error('berat_badan') is-invalid @enderror " type="number"
                                    name="berat_badan" id="berat_badan" placeholder="65" value="{{ old('berat_badan') }}" />
                                @error('berat_badan')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="mb-3 col-md-6">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select id="jenis_kelamin"
                                    class="select2 form-select @error('jenis_kelamin') is-invalid @enderror"
                                    name="jenis_kelamin" autofocus>
                                    <option value="" selected>Select Gender</option>
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
                                <label for="profesi" class="form-label">Profesi</label>
                                <input class="form-control @error('profesi') is-invalid @enderror " type="text"
                                    id="profesi" name="profesi" placeholder="Mahasiswa" value="{{ old('profesi') }}" />
                                @error('profesi')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    id="alamat" name="alamat" placeholder="Jl. jalan" value="{{ old('alamat') }}" />
                                @error('alamat')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
                <!-- /Form Profile -->
            </div>
        </div>
    </div>
@endsection
