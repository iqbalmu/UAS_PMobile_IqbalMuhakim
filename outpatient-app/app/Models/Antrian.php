<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Antrian extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_antrian';

    protected $fillable = ['mrn', 'poli_id', 'tanggal', 'nomor', 'status'];

    /**
     * Get the pasien that owns the Antrian
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class, 'mrn', 'mrn');
    }

    /**
     * Get the poli that owns the Antrian
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function poli(): BelongsTo
    {
        return $this->belongsTo(Poli::class, 'poli_id', 'id_poli');
    }

    public static function nomorAntrian($poli_id, $tanggal)
    {
        $lastRecord = self::where('poli_id', $poli_id)->where('tanggal', $tanggal)->latest()->first();
        $nomor = ($lastRecord) ? $lastRecord->nomor + 1 : 1;
        return $nomor;
    }
}
