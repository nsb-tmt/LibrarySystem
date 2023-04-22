<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;

class User extends Model
{
    use HasFactory;
    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
