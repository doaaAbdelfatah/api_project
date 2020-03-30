<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    function creator ()
    {
        return $this->belongsTo("App\User" ,"created_by" ,"id");
    }
}
