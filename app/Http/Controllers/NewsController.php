<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Route;

class NewsController extends Controller
{
    /**
     * Главная страница
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(){

        return view('site.news.index',[
            'news'=>News::paginate(3),
            'categories'=>Categories::all()
        ]);
    }

    /**
     * Создание новости
     * @param Request $rq
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
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

    /**
     * Подробная информация о новости
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function more($id){
        $news = new News();

        return view('site.news.more',[
            'news'=>$news->findById($id),
            'categories'=>Categories::all()
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id){
        $news = new News();

        $news->deleteNews($id);

        return redirect()->route('index');
    }
}
