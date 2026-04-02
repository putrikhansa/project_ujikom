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
                                    <i class="ti-pencil-alt me-2 text-info"></i>Ubah Data Obat
                                </h5>
                            </div>
                            <div class="col text-end">
                                <a href="{{ route('backend.obat.index') }}" class="btn btn-sm btn-light border">
                                    <i class="ti-arrow-left me-1"></i>Kembali
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('backend.obat.update', $obat->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Nama Obat</label>
                                        <input type="text" name="nama_obat"
                                            class="form-control @error('nama_obat') is-invalid @enderror"
                                            value="{{ old('nama_obat', $obat->nama_obat) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Kategori</label>
                                        <input type="text" name="kategori"
                                            class="form-control @error('kategori') is-invalid @enderror"
                                            value="{{ old('kategori', $obat->kategori) }}" required
                                            placeholder="Misal: Paracetamol, Sirup, dll">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Stok</label>
                                                <input type="number" name="stok"
                                                    class="form-control @error('stok') is-invalid @enderror"
                                                    value="{{ old('stok', $obat->stok) }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Unit</label>
                                                <input type="text" name="unit"
                                                    class="form-control @error('unit') is-invalid @enderror"
                                                    value="{{ old('unit', $obat->unit) }}" required
                                                    placeholder="Misal: Tablet, Botol">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Tanggal Kadaluarsa</label>
                                        <input type="date" name="tanggal_kadaluarsa"
                                            class="form-control @error('tanggal_kadaluarsa') is-invalid @enderror"
                                            value="{{ old('tanggal_kadaluarsa', $obat->tanggal_kadaluarsa) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Deskripsi / Aturan Pakai</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5"
                                            placeholder="Tambahkan informasi aturan pakai atau kegunaan...">{{ old('deskripsi', $obat->deskripsi) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <hr class="horizontal dark my-4">

                            <div class="d-flex justify-content-end gap-2">
                                <button type="reset" class="btn btn-light px-4">
                                    <i class="ti-reload me-1"></i>Reset
                                </button>
                                <button type="submit" class="btn btn-info px-5 text-white shadow-sm">
                                    <i class="ti-save me-1"></i>Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
