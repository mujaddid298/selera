<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananPaket extends Model
{
    protected $table = 'pemesananpaket';

    // Define fillable fields
    protected $fillable = [
        'user_id',
        'name',
        'alamat',
        'no_hp',
        'jenis_paket',
        'harga',
        'bukti_pembayaran',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define relationship with Paket model
    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }
}
