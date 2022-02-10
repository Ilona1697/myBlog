<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Admin\Post\BaseController;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\Admin\Post\UpdateRequest;


class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post){
        $data = $request->validated();
        $this->service->update($data, $post);
    
        return view('admin.posts.show', compact('post'));
    }
}
