<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PasienResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "mrn" => $this->mrn,
            "nik" => $this->nik,
            "bpjs" => $this->bpjs,
            "jenis_kelamin" => $this->jenis_kelamin,
            "profesi" => $this->profesi,
            "alamat" => $this->alamat,
            "image_profile" => $this->image_profile
        ];
    }
}
