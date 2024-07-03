<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RekamMedikResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'mrn' => $this->mrn,
            'keluhan_utama' => $this->keluhan_utama,
            'diagnosis' => $this->diagnosis,
            'penatalaksanaan' => $this->penatalaksanaan,
            'catatan_dokter' => $this->catatan_dokter,
            'created_at' => $this->created_at->format('Y-m-d'),
            'dokter' => DokterResource::make($this->whenLoaded('dokter')),
            'pemeriksaan' => PemeriksaanResource::make($this->whenLoaded('pemeriksaan')),
            'resep' => ResepResource::make($this->whenLoaded('resep')),
        ];
    }
}
