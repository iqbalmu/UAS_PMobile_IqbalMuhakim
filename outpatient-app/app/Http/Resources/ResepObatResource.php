<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResepObatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'obat' => $this->obat->nama,
            'dosis' => $this->dosis,
            'frekuensi' => $this->frekuensi,
            'durasi' => $this->durasi,
            'metode' => $this->metode,
            'syarat' => $this->syarat,
        ];
    }
}
