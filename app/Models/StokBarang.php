<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBarang extends Model
{
    use HasFactory;

    protected $table = 'stok_barang';
    protected $fillable = [
        'id_barang',
        'stok',
        'id_satuan'
    ];

    public function barang() {
        return $this->hasOne(Barang::class, 'id_barang');
    }
    public function satuan() {
        return $this->hasOne(Satuan::class, 'id_satuan');
    }
}
