<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JanjiTemu extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_janjitemu';

    protected $fillable = ['mrn', 'dokter_id', 'tanggal', 'waktu', 'status'];

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
     * Get the dokter that owns the JanjiTemu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class, 'dokter_id', 'id_dokter');
    }
}
