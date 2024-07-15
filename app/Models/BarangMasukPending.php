<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasukPending extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk_pending';
    protected $fillable = [
        'supplier_id',
        'user_id',
        'barang_id',
        'jumlah_masuk',
        'dikonfirmasi'
    ];

    public function barangId() {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function supplierId() {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function userId() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
