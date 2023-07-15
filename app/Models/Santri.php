<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $fillable = ['nama_santri','nisn','nik','jenis_kelamin','tempat_lahir','tanggal_lahir','alamat_lengkap','tahun_lulus','nama_wali','nik_wali','alamat_wali','pekerjaan_wali','nomor_telepon','id_sekolah','foto'];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }
    public function tagihan()
    {
        return $this->hasMany(Tagihan::class);
    }
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
