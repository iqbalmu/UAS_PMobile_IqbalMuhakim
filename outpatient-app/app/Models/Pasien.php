<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pasien extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pasien';
    protected $fillable = ['nik','bpjs','jenis_kelamin','alamat','alamat','profesi','image_profile','user_id'];

    /**
     * Get the user that owns the Pasien
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    protected static function boot(){
        parent::boot();
        static::creating(function ($pasien) {
            $pasien->mrn = 'RM-' . date('YmdHis');
        });
    }
}
