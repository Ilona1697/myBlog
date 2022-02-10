<?php
namespace App\Http\Controllers\Admin\Post;

use App\Services\PostService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;


class BaseController extends Controller
{
    public $service;

    public function __construct(PostService $service){
        $this->service = $service;
    } 
}
