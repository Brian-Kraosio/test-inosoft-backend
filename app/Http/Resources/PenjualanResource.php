<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PenjualanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
                '_id' => $this->_id,
                'nama_pembeli' => $this->nama_pembeli,
                'order_date' => $this->nama_pembeli,
                'order_kendaraan' => [
                    'kendaraan_id' => $this->order_kendaraan['kendaraan_id'],
                    'quantity' => $this->order_kendaraan['quantity'],
                ],
        ];
    }
}
