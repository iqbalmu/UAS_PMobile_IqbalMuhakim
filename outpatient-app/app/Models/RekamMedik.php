<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RekamMedik extends Model
{
    use HasFactory;

    protected $primaryKey = "id_rekam_medik";

    public function pemeriksaan(): BelongsTo
    {
        return $this->belongsTo(Pemeriksaan::class, 'pemeriksaan_id', 'id_pemeriksaan');
    }

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class, 'mrn', 'mrn');
    }

    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class, 'dokter_id', 'id_dokter');
    }

    public function resep(): BelongsTo
    {
        return $this->belongsTo(Resep::class, 'resep_id', 'id_resep');
    }

    public function pembayaran(): HasOne
    {
        return $this->hasOne(Pembayaran::class, 'rekam_medik_id', 'id_rekam_medik');
    }
}
