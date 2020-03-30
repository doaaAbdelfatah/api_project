<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // $user =User::find($this->created_by);

        return [
            "id" => $this->id ,
            "customer_name" =>$this->name,
            "created_at" =>$this->created_at->format("d/m/Y"),
            // "by_user" =>["id" =>$this->creator->id ,"name"  =>$this->creator->name],
            // "by_user" =>new UserResource($this->creator),
            // "user" =>new UserResource($user),
            // "test" =>"data"
        ];
    //    return parent::toArray($request);
    }


    public function with($request){
        return [
            "version" => ["1.0.0.0" ] ,
            "author_name" =>"Doaa Abd Elfatah"
        ];
    }
}
