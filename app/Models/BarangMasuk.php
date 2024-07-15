<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';
    protected $fillable = [
        'barang_id',
        'supplier_id',
        'jumlah_masuk',
        'tanggal_masuk'
    ];

    public function barangId() {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function supplierId() {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
