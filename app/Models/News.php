<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

/**
 * Это класс модели таблицы "news".
 *
 * @property int $id
 * @property string|null $header
 * @property int $id_categories
 * @property string|null $information
 * @property string|null $date
 *
 * @property Categories $categories
 */

class News extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Название таблицы
     * @return string
     */
    public function getTable()
    {
        return 'news';
    }

    /**
     * Получение категории из модели Categories
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories(){
        return $this->belongsTo(Categories::class,'id_categories','id');
    }

    /**
     * Создание новости
     * @param Request $values
     * @return void
     */
    public function createNews($values){
        $instance = new News();

        try {
            $instance->header = $values['header'];
            $instance->id_categories = $values['category'];
            $instance->information = $values['information'];
            $instance->date = date('Y-m-d');

            $instance->save();
        } catch (\Exception $exception){
            dd($exception);
        }
    }

    /**
     * Изменение значений новости
     * @param int $id
     * @param Request $values
     * @return void
     */
    public function updateNews($id, $values)
    {
        $instance = News::find($id);

        try {
            $instance->header = $values['header'];
            $instance->id_categories = $values['category'];
            $instance->information = $values['information'];
            $instance->date = date('Y-m-d');

            $instance->save();
        } catch (\Exception $exception){
            dd($exception);
        }
    }

    /**
     * Удаление записи по id
     * @param int $id
     * @return void
     */
    public function deleteNews($id){
        News::find($id)->delete();
    }
}
