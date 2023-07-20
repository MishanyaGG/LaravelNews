<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Route;

class NewsController extends Controller
{
    // Главная страница
    public function index(){

        return view('site.news.index',[
            'news'=>News::paginate(3),
            'categories'=>Categories::all()
        ]);
    }

    /**
     * Создание новости
     * @param Request $rq
     */
    public function create(Request $rq){

        // Если НЕ POST-запрос
        if($_POST == []){
            return view('site.news.create',[
                'categories'=>Categories::all()
            ]);
        } else {
            $news = new News();
            $news->createNews($rq->all());

            return redirect()->route('index');
        }
    }
}
