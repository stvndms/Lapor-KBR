<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Masyarakat extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'nik';
    protected $table = 'masyarakat';
    protected $fillable = ['nik', 'nama', 'username', 'password', 'telp'];

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }
}
