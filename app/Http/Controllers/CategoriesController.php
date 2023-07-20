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

    public function delete($id){
        Categories::find($id)->delete();

        return redirect()->route('index');
    }

    public function update(Request $rq,$id){
        if ($_POST == []){
            return view('site.category.update',[
                'categories'=>Categories::find($id)
            ]);
        } else{
            $category = new Categories();

            $category->categoryUpdate($id,$rq->all());

            return redirect()->route('index');
        }
    }
}
