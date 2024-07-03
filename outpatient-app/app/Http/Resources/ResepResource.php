<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResepResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_resep' => $this->id_resep,
            'kode' => $this->kode,
            'keterangan' => $this->keterangan,
            'obat' => ResepObatCollection::make($this->whenLoaded('details'))
        ];
    }
}
