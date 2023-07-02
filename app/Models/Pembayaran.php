<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formulir;

class Pembayaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function formulirs()
    {
        return $this->belongsTo(Formulir::class,'form_id');
    }
}
