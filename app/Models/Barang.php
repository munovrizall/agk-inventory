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
    
    public function barangId() {
        return $this->hasOne(BarangMasukPending::class, 'barang_id');
    }

    public function barangKeluarId() {
        return $this->hasOne(BarangKeluarPending::class, 'barang_id');
    }
}
