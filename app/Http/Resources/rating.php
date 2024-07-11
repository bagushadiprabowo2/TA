<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class rating extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return {
            'id_usaha'=>$this->id_usaha,
            'id_pengguna'=>$this->id_pengguna,
            'komen'=>$this->komen,
            'rating'=>$this->rating
        }
    }
}
