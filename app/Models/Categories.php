<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    /**
     * Название таблицы
     * @return string
     */
    public function getTable()
    {
        return 'categories';
    }

    /**
     * Получение всех записей модели
     * @return Categories
     */
    public function show(){
        return Categories::all();
    }

    /**
     * Поиск записи по id
     * @return Categories
     */
    public function findById($id){
        return Categories::find($id);
    }

    public function news(){
        return $this->hasMany(News::class,'id_categories','id');
    }

    /*
     * Удаление записи по id
     */
    public function deleteCategories($id){
        Categories::find($id)->delete();
    }
}
