<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostStar extends Model
{
    protected $table = 'posts_stars';

    use HasFactory;

    protected $fillable = [
        'user_id'
    ];
}
