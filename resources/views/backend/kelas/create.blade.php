@extends('layouts.backend')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0 fw-bold text-dark">
                                    <i class="me-2 text-primary"></i>Tambah Kelas Baru
                                </h5>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <a href="{{ route('backend.kelas.index') }}" class="btn btn-sm btn-light border">
                                    Kembali <i class="ti-arrow-left ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('backend.kelas.store') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label class="form-label fw-bold">Nama Kelas</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="ti-layout-grid2 text-muted"></i>
                                    </span>
                                    <input type="text" name="nama_kelas"
                                        class="form-control ps-2 @error('nama_kelas') is-invalid @enderror"
                                        placeholder="Contoh: XII RPL 1" value="{{ old('nama_kelas') }}" required>

                                    @error('nama_kelas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <small class="text-muted mt-2 d-block">Gunakan format yang konsisten (misal:
                                    Tingkat-Jurusan-Nomor).</small>
                            </div>

                            <hr class="horizontal dark my-4">

                            <div class="d-flex justify-content-end gap-2">
                                <button type="reset" class="btn btn-light px-4">
                                    <i class="ti-reload me-1"></i>Reset
                                </button>
                                <button type="submit" class="btn btn-primary px-5 shadow-sm"> <i
                                        class="ti-save me-1"></i>Simpan Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
