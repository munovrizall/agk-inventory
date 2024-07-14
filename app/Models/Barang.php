<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $fillable = [
        'nama_barang',
        'stok',
        'satuan_id',
        'jenis_id'
    ];
    public function jenisBarang() {
        return $this->belongsTo(JenisBarang::class, 'jenis_id');
    }

    public function satuan() {
        return $this->belongsTo(Satuan::class, 'satuan_id');
    }
}
