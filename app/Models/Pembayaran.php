<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = ['tagihan_id','santri_id', 'total_tagihan', 'jumlah_bayar'];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
    
    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class);
    }
    
}
