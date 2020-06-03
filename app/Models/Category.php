<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Category extends Model
{
    public function parent()
        {
            return $this->belongsTo(Category::class, 'parent_id');
        }
}
