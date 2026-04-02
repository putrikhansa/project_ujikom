<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // tambahkan kode ini

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens; // tambahkan kode ini

    /**
     * Mass assignable
     */
    protected $fillable = [
        'name',
        'email',
        'no_hp',
        'password',
        'role',
    ];

    /**
     * Hidden attributes
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    /* =====================
     | ROLE HELPERS
     |=====================*/

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isPetugas(): bool
    {
        return $this->role === 'petugas';
    }

    public function isSiswa(): bool
    {
        return $this->role === 'siswa';
    }

    /* =====================
     | RELATIONS
     |=====================*/

    public function logAktivitas()
    {
        return $this->hasMany(LogAktivitas::class);
    }
}
