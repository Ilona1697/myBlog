<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
class PostUserLike extends Model
{
    use HasFactory;
    protected $table = 'post_user_likes';
    protected $guarded = false;

    
}
