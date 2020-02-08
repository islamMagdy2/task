<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $guarded=[];
    public function companies(){
        return $this->belongsTo(Companies::class);
    }
}
