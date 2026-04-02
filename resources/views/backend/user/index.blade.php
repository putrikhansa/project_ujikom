@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <div class="card shadow-sm border-0">

                    {{-- Header --}}
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <span>Data User</span>
                        <a href="{{ route('backend.user.create') }}" class="btn btn-light btn-sm fw-semibold">
                            <i class="bx bx-plus me-1"></i> Tambah User
                        </a>
                    </div>

                    {{-- Body --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle" id="datauser">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width:5%">No</th>
                                        <th>Nama User</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Role</th>
                                        <th style="width:15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if (empty($user->no_hp))
                                                    <span class="text-muted fst-italic">Tidak tersedia</span>
                                                @else
                                                    {{ $user->no_hp }}
                                                @endif
                                            </td>
                                            <td>
                                                <span
                                                    class="badge 
                                                    {{ $user->role === 'admin' ? 'bg-danger' : 'bg-info' }}">
                                                    {{ ucfirst($user->role) }}
                                                </span>
                                            </td>
                                            <td>
                                                @if ($user->role !== 'admin')
                                                    <form action="{{ route('backend.user.destroy', $user->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Yakin hapus user ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="text-muted fst-italic">Tidak bisa dihapus</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>

    <script>
        new DataTable('#datauser');
    </script>
@endpush
