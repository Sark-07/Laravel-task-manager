<?php

namespace App\Models;

use App\Models\Tasks;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tasks() {

        // return $this->hasMany(Tasks::class);
        return $this->belongsToMany(Tasks::class, 'category_task');
    }
}
