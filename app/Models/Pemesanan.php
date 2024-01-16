<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    // Define the table associated with the model
    protected $table = 'pemesanan';

    // Define fillable fields
    protected $fillable = [
        'id',
        'makanan_id',
        'user_id',
        'name',
        'alamat',
        'metode_pembayaran',
        'bukti_pembayaran',
        'status',
    ];

    // Define relationships with other models
    public function makanan()
    {
        return $this->belongsTo(Makanan::class, 'makanan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
