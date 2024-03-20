<?php

namespace App\Models;

use App\Models\User;
use App\Models\Tasks;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function task() {
        return $this->belongsTo(Tasks::class);
    }


    public function user() {
        return $this->belongsTo(User::class);
    }
}
