<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekamMedis; // sesuaikan nama model kalau beda

class RekamMedisController extends Controller
{
    public function terbaru(Request $request)
    {
        $rekamMedis = RekamMedis::with('siswa') // relasi ke siswa kalau ada
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return response()->json([
            'message' => 'Daftar rekam medis terbaru',
            'data' => $rekamMedis->map(function ($rm) {
                return [
                    'id' => $rm->id,
                    'siswa' => $rm->siswa ? $rm->siswa->nama : 'Tidak diketahui',
                    'keluhan' => $rm->keluhan,
                    'tindakan' => $rm->tindakan,
                    'tanggal' => $rm->created_at->format('d M Y H:i'),
                    'status' => $rm->status ?? 'Belum ditentukan',
                ];
            }),
        ]);
    }

    // Kalau mau tampil semua atau filter, tambah method index nanti
}