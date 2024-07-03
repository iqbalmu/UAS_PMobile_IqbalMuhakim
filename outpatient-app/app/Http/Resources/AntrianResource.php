<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AntrianResource extends JsonResource
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
            'nomor' => $this->nomor,
            'status' => $this->status,
            'tanggal' => $this->tanggal,
            'poli' => PoliResource::make($this->whenLoaded('poli'))
        ];
    }
}
