@extends('layouts.backend')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-sm border-0">

                    {{-- Header --}}
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0">
                            <i class="bx bx-user-plus me-2"></i>Tambah Pengguna Baru
                        </h5>
                    </div>

                    {{-- Body --}}
                    <div class="card-body p-4">
                        <form action="{{ route('backend.user.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                {{-- Nama Lengkap --}}
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Nama Lengkap</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="bx bx-user"></i>
                                        </span>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Masukkan nama lengkap">
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Alamat Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="bx bx-envelope"></i>
                                        </span>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="nama@email.com">
                                    </div>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- No HP --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Nomor WhatsApp</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="bx bx-phone"></i>
                                        </span>
                                        <input type="number" name="no_hp" value="{{ old('no_hp') }}"
                                            class="form-control @error('no_hp') is-invalid @enderror"
                                            placeholder="08xxxxxxxxxx">
                                    </div>
                                    @error('no_hp')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Role --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Hak Akses (Role)</label>
                                    <select name="role" class="form-control @error('role') is-invalid @enderror"
                                        required>
                                        <option value="" disabled selected>-- Pilih Role --</option>
                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                                            Administrator
                                        </option>
                                        <option value="petugas" {{ old('role') == 'petugas' ? 'selected' : '' }}>
                                            Petugas UKS
                                        </option>
                                    </select>
                                    @error('role')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Password --}}
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-bold">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="bx bx-lock-alt"></i>
                                        </span>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Minimal 6 karakter">
                                    </div>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <hr class="mt-0 mb-4">

                            {{-- Action --}}
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('backend.user.index') }}" class="btn btn-light border">
                                    <i class="bx bx-arrow-back me-1"></i> Kembali
                                </a>
                                <button type="reset" class="btn btn-outline-warning">
                                    <i class="bx bx-refresh me-1"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bx bx-save me-1"></i> Simpan User
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
