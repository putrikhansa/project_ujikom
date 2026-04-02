<?php
namespace App\Http\Controllers;

use App\Models\EdukasiKesehatan;
use App\Models\JadwalPemeriksaan;
use App\Models\Obat;
use App\Models\RekamMedis;
use App\Models\User;

class FrontController extends Controller
{
    public function index()
    {
        $users           = User::where('role', 'petugas')->get();
        $jumlahKunjungan = RekamMedis::count();
        $jumlahObat      = Obat::count();

                                                // TAMBAHKAN baris ini untuk mengambil data obat
        $obat = Obat::latest()->take(6)->get(); // Ambil 6 obat terbaru untuk ditampilkan di depan

        $jadwal = JadwalPemeriksaan::with(['kelas', 'user'])
            ->orderBy('tanggal', 'asc')
            ->get();

        $edukasi = EdukasiKesehatan::with('kategoriEdukasi')
            ->where('status', 'publish')
            ->whereDate('tanggal_publish', '<=', now())
            ->latest()
            ->take(3)
            ->get();

        // Masukkan 'obat' ke dalam compact
        return view('welcome', compact(
            'users',
            'jumlahKunjungan',
            'jumlahObat',
            'jadwal',
            'edukasi',
            'obat' // <--- Pastikan ini ada
        ));
    }

    public function indexEdukasi()
    {
        // Tampilkan semua (dengan pagination 9 data per halaman)
        $edukasi = EdukasiKesehatan::with('kategoriEdukasi')
            ->where('status', 'publish')
            ->latest()
            ->paginate(9); // Pakai paginate agar muncul tombol halaman

        return view('backend.edukasi.index_all', compact('edukasi'));
    }
    // Pastikan model Edukasi sudah di-import di atas (use App\Models\EdukasiKesehatan;)
    public function showEdukasi($id)
    {
        $item = \App\Models\EdukasiKesehatan::with('kategoriEdukasi')->findOrFail($id);

        // Sesuaikan path view dengan struktur folder di gambar kamu
        return view('backend.edukasi.edukasi_show', compact('item'));
    }
    public function daftarObat()
    {
        // Mengambil semua data obat
        $daftarObat = \App\Models\Obat::orderBy('nama_obat', 'asc')->get();

        return view('stok_obat', compact('daftarObat'));
    }
}
