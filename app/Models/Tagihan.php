<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;
    protected $table = 'tagihans';


    protected $fillable = ['santri_id','deskripsi','jumlah'];
    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
    
}
