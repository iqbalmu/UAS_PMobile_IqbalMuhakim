<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResepDetail extends Model
{
    use HasFactory;

    public function obat(): BelongsTo
    {
        return $this->belongsTo(Obat::class, 'obat_id', 'id_obat');
    }
}
