<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    //
    public function filter(){
        return $this->belongsTo('App\Models\Filter','filter_alias','alias');
    }
}
