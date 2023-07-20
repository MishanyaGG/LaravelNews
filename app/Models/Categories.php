<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Это класс модели таблицы "categories".
 *
 * @property int $id
 * @property string|null $name_of_category
 *
 * @property News $news
 */

class Categories extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Название таблицы
     * @return string
     */
    public function getTable()
    {
        return 'categories';
    }

    public function categoryCreate($values){
        $instance = new Categories();

        try {
            $instance->name_of_category = $values['name_of_category'];

            $instance->save();
        } catch (\Exception $exception){
            dd($exception);
        }
    }

    /**
     * Связь с моделью "news"
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news(){
        return $this->hasMany(News::class,'id_categories','id');
    }

    /**
     * Удаление категории
     * @param int $id
     * @return void
     */
    public function deleteCategories($id){
        Categories::find($id)->delete();
    }
}
