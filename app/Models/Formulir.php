<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Pembayaran;

class Formulir extends Model
{
    use HasFactory;

    protected $table = 'formulirs';
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    
    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
