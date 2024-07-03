<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DokterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_dokter,
            'nama' => $this->user->nama,
            'email' => $this->user->email,
            'nomor_hp' => $this->user->nomor_hp,
            'foto' => $this->foto,
            'nomor_str' => $this->nomor_str,
            'nomor_sip' => $this->nomor_sip,
            'spesialisasi' => $this->spesialisasi,
            'poli' => PoliResource::make($this->whenLoaded('poli')),
            'jadwal' => JadwalCollection::make($this->whenLoaded('jadwal'))
        ];
    }
}
