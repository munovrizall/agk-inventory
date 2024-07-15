<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluarPending extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar_pending';
    protected $fillable = [
        'user_id',
        'barang_id',
        'jumlah_keluar',
    ];

    public function barangId() {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function userId() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
