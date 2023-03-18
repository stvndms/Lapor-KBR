<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pengaduan';
    protected $table = 'pengaduan';
    protected $fillable = ['id_pengaduan', 'judul', 'kategori', 'tgl_pengaduan', 'nik', 'isi_laporan', 'foto', 'status'];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class);
    }

    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class);
    }
}
