<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;

    protected $table = 'jenis_barang';
    protected $fillable = [
        'nama_jenis',
    ];

    public function barang() {
        return $this->hasOne(Barang::class, 'jenis_id');
    }
}
