<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class NewsController extends Controller
{
    public function index(){

        return view('site/index',[
            'news'=>News::paginate(3),
            'categories'=>Categories::all()
        ]);
    }
}
