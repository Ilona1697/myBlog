<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Admin\Post\BaseController;
use Illuminate\Http\Request;
use App\Models\Post;

class DeleteController extends BaseController
{
    public function __invoke(Post $post){
        auth()->user()->likedPosts()->detach($post->id);
        return redirect()->route('personal.liked.index');
    }
}
