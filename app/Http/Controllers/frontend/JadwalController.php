<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Carbon\Carbon;

class JadwalFrontendController extends Controller
{
    public function index()
    {
        $today = Carbon::today(); // '2026-02-06'

        $jadwal = Jadwal::whereRaw('DATE(tanggal) >= ?', [$today->toDateString()])
            ->with(['kelas', 'user'])
            ->orderByRaw("
            CASE
                WHEN DATE(tanggal) = ? THEN 1          -- Hari Ini → NO 1
                WHEN DATE(tanggal) = DATE_ADD(?, INTERVAL 1 DAY) THEN 2  -- Besok → NO 2
                ELSE 3                                 -- Mendatang lain → NO 3 dst.
            END ASC,
            tanggal ASC
        ", [$today->toDateString(), $today->toDateString()])
            ->get();

        return view('frontend.index', compact('jadwal')); // ganti nama view kalau beda
    }
}
