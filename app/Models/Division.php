<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use App\Models\Division;

class Division extends Model
{
    public function district()
    {
        return $this->hasMany(District::class);
    }
}
