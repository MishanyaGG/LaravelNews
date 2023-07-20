<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function create(Request $rq){
        if ($_POST == []){
            return view('site.category.create');
        } else{
            $category = new Categories();

            $category->categoryCreate($rq->all());

            return redirect()->route('index');
        }

    }
}
