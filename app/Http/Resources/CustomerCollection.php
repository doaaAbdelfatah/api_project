<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          "data" => $this->collection,
          "version" => ["1.0.0.0" ] ,
          "author_name" =>"Doaa Abd Elfatah"
        ];
    //    return parent::toArray($request);
    }
}
