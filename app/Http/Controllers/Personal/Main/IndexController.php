<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class IndexController extends Controller
{
    public function __invoke(){
        return view('personal.main.index');
    }
}
