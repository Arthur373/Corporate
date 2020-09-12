<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    //
    public function portfolios(){
        return $this->hasMany('App\Models\Portfolio');
    }
}
