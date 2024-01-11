<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BiodataUmumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nama_lengkap' => $this->nama_lengkap,
            'nik' => $this->nik,
            'jk' => $this->jk,
            'tmpt_lahir' => $this->tmpt_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'agama' => $this->agama,
            'kewarganegaraan' => $this->kewarganegaraan,
            'addr_prov' => $this->addr_prov,
            'addr_kab' => $this->addr_kab,
            'addr_kec' => $this->addr_kec,
            'addr_des' => $this->addr_des,
            'addr_dus' => $this->addr_dus,
            'addr_rt' => $this->addr_rt,
            'addr_rw' => $this->addr_rw,
            'id_pendaftar' => $this->id_pendaftar,
        ];
    }
}
