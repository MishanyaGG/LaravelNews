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
            'news'=>News::orderBy('date','desc')->paginate(3),
            'categories'=>Categories::all()
        ]);
    }

    /**
     * Главная страница (с начала старые новости)
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function old(){
        return view('site.news.index',[
            'news'=>News::orderBy('date')->paginate(3),
            'categories'=>Categories::all()
        ]);
    }

    /**
     * Фильтрация новостей
     * @param Request $rq
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function findByCategory(Request $rq){
        return view('site.news.index',[
            'news'=>News::where('id_categories','=',$rq->all()['id_categories'])->paginate(3),
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
            $news->newsCreate($rq->all());

            return redirect()->route('index');
        }
    }

    /**
     * Изменение значений новости
     * @param Request $rq
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $rq,$id){
        // Если НЕ POST-запрос
        if($_POST == []){
            return view('site.news.update',[
                'news'=>News::find($id),
                'categories'=>Categories::all()
            ]);
        } else {
            $news = new News();
            $news->newsUpdate($id,$rq->all());

            return redirect()->route('index');
        }
    }

    /**
     * Подробная информация о новости
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function more($id){
        return view('site.news.more',[
            'news'=>News::find($id),
            'categories'=>Categories::all()
        ]);
    }

    /**
     * Удаление новости
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id){
        $news = new News();

        $news->newsDelete($id);

        return redirect()->route('index');
    }
}
