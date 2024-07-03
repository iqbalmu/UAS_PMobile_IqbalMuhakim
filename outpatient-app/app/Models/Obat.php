<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $primaryKey = "id_obat";

    protected $fillable = [
        'nama',
        'kategori',
        'penyedia',
        'harga',
        'stok',
        'kadaluarsa',
        'keterangan',
        'user_id',
    ];

    
}
