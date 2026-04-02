<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EdukasiKesehatan extends Model
{
    use HasFactory;

    protected $table = 'edukasi_kesehatan';

    protected $fillable = [
        'judul',
        'isi',
        'foto', // <-- Tambahkan ini
        'kategori_id',
        'penulis_id',
        'status',
        'tanggal_publish',
    ];

    /**
     * Casting variabel agar Laravel otomatis mengubah string tanggal
     * menjadi objek Carbon (biar gampang diformat di View)
     */
    protected $casts = [
        'tanggal_publish' => 'date',
    ];

    /**
     * Relasi ke Kategori
     */
    /**
     * Relasi ke Kategori
     * Saya sarankan ganti nama fungsi ini jadi kategoriEdukasi agar cocok dengan Controller
     */
    public function kategoriEdukasi()
    {
        return $this->belongsTo(KategoriEdukasi::class, 'kategori_id');
    }
    /**
     * Relasi ke User (Penulis)
     */
    public function penulis()
    {
        return $this->belongsTo(User::class, 'penulis_id');
    }
}
