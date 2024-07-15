<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';
    protected $fillable = [
        'nama_supplier',
        'no_telp',
        'alamat',
    ];

    public function supplierId() {
        return $this->hasOne(BarangMasukPending::class, 'barang_id');
    }
}
