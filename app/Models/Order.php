<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'nama_pemesan',
        'jenis_kelamin',
        'nomor_identitas',
        'room_id',
        'tanggal_pesan',
        'durasi_menginap',
        'breakfast',
        'total_bayar'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
