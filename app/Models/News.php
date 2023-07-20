<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class News extends Model
{
    use HasFactory;

    /**
     * Название таблицы
     * @return string
     */
    public function getTable()
    {
        return 'news';
    }

    /**
     * Поиск по id
     * @param integer $id
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findById($id){
        return News::find($id);
    }

    /**
     * Получение всех записей модели
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function show(){
        return News::all();
    }

    /**
     * Получение категории из модели Categories
     * @return
     */
    public function categories(){
        return $this->belongsTo(Categories::class,'id_categories','id');
    }

    /**
     * Удаление записи по id
     * @param integer $id
     */
    public function deleteNews($id){
        News::find($id)->delete();
    }
}
