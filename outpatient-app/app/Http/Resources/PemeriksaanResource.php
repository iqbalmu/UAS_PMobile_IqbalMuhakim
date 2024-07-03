<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PemeriksaanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "suhu" => $this->suhu,
            "tekanan_darah" => $this->tekanan_darah,
            "nadi" => $this->nadi,
            "pernapasan" => $this->pernapasan,
            "tinggi" => $this->tinggi,
            "berat" => $this->berat
        ];
    }
}
