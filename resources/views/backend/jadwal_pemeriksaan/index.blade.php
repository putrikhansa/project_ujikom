@extends('layouts.backend')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <div class="card shadow-sm border-0">
                    {{-- Header --}}
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center py-3">
                        <h5 class="text-white"><i class="bx bx-calendar me-2"></i>Data Jadwal Pemeriksaan</h5>
                        <a href="{{ route('backend.jadwal_pemeriksaan.create') }}" class="btn btn-light btn-sm fw-bold">
                            <i class="bx bx-plus"></i> Tambah Jadwal
                        </a>
                    </div>

                    {{-- Body --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered align-middle" id="datajadwal_pemeriksaan"
                                style="width:100%">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="15%">Tanggal</th>
                                        <th width="15%">Kelas</th>
                                        <th>Petugas</th>
                                        <th>Keterangan</th>
                                        <th width="12%">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($jadwal_pemeriksaan as $data)
                                        @php
                                            $tanggal = \Carbon\Carbon::parse($data->tanggal);
                                            $isToday = $tanggal->isToday();
                                            $isPast = $tanggal->isPast() && !$isToday; // sudah lewat
                                        @endphp

                                        <tr
                                            class="{{ $isPast ? 'table-secondary text-muted' : ($isToday ? 'table-warning' : '') }}">
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <strong>{{ $tanggal->format('d/m/Y') }}</strong>
                                                <br>
                                                @if ($isToday)
                                                    <span class="badge bg-danger px-3 py-1 fw-bold"
                                                        style="font-size: 0.85rem;">Hari Ini</span>
                                                @elseif ($isPast)
                                                    <span
                                                        class="badge bg-danger-subtle text-danger border border-danger px-3 py-1 fw-bold"
                                                        style="font-size: 0.85rem;">
                                                        Selesai
                                                    </span>
                                                @else
                                                    <span class="badge bg-info px-3 py-1 fw-bold"
                                                        style="font-size: 0.85rem;">Mendatang</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-info text-white">
                                                    {{ $data->kelas->nama_kelas ?? '-' }}
                                                </span>
                                            </td>
                                            <td class="{{ $isPast ? 'text-muted' : '' }}">
                                                <i class="bx bx-user-circle me-1 text-primary"></i>
                                                {{ $data->user->name ?? '-' }}
                                            </td>
                                            <td class="{{ $isPast ? 'text-decoration-line-through text-muted' : '' }}">
                                                <div class="text-truncate-custom" title="{{ $data->keterangan }}">
                                                    {{ $data->keterangan ?? 'Pemeriksaan Rutin' }}
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-inline-flex align-items-center justify-content-center gap-1">
                                                    {{-- Detail --}}
                                                    <a href="{{ route('backend.jadwal_pemeriksaan.show', $data->id) }}"
                                                        class="btn btn-info btn-sm d-flex align-items-center justify-content-center"
                                                        style="width: 32px; height: 32px;" title="Detail">
                                                        <i class="bx bx-show fs-5 text-white"></i>
                                                    </a>

                                                    {{-- Edit --}}
                                                    <a href="{{ route('backend.jadwal_pemeriksaan.edit', $data->id) }}"
                                                        class="btn btn-success btn-sm d-flex align-items-center justify-content-center"
                                                        style="width: 32px; height: 32px;" title="Edit">
                                                        <i class="bx bx-edit fs-5"></i>
                                                    </a>

                                                    {{-- Hapus (Admin Only) --}}
                                                    @if (auth()->user()->role === 'admin')
                                                        <form
                                                            action="{{ route('backend.jadwal_pemeriksaan.destroy', $data->id) }}"
                                                            method="POST" class="m-0 d-inline"
                                                            onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm d-flex align-items-center justify-content-center"
                                                                style="width: 32px; height: 32px;" title="Hapus">
                                                                <i class="bx bx-trash fs-5"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4 text-muted">
                                                Belum ada data jadwal pemeriksaan.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <!-- ... style lama tetap ... -->

    <style>
        /* Jadwal sudah selesai */
        tr.table-secondary {
            background-color: #f8f9fa !important;
            opacity: 0.85;
        }

        tr.table-secondary td {
            color: #6c757d !important;
        }

        /* Jadwal hari ini */
        tr.table-warning {
            background-color: #fff3cd !important;
            border-left: 4px solid #fd7e14 !important;
        }

        /* Badge lebih kecil & rapi */
        .badge {
            font-size: 0.75rem;
            padding: 0.4em 0.8em;
        }

        /* Kolom aksi lebih rapi */
        td.text-center .btn {
            min-width: 32px;
            padding: 0;
        }
    </style>
    <style>
        /* Badge Selesai lebih menonjol */
        .badge.bg-danger-subtle {
            background-color: #f8d7da !important;
            color: #dc3545 !important;
            font-weight: 700 !important;
            border: 1px solid #dc3545 !important;
        }

        /* Baris selesai tetap redup tapi badge tetap terbaca */
        tr.table-secondary {
            background-color: #f1f3f5 !important;
            opacity: 0.9 !important;
            /* naikkan sedikit biar tidak terlalu redup */
        }

        tr.table-secondary td {
            color: #495057 !important;
            /* teks lebih gelap supaya readable */
        }
    </style>
@endsection
