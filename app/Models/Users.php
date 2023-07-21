<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Это класс модели таблицы "users".
 *
 * @property int $id
 * @property string|null login
 * @property string|null password
 *
 * @property Users $users
 */
class Users extends Model
{
    use HasFactory;

    /**
     * Название таблицы
     * @return string
     */
    public function getTable()
    {
        return 'users';
    }

    /**
     * Вход в аккаунт
     * @param Request $values
     * @return bool
     */
    public function login($values){
        if (Users::where([
            ['login','=',$values['login']],
            ['password','=',$values['password']]
        ])->count() == 1){

            $_SESSION['users']=[
                'login'=>$values['login'],
                'password'=>$values['password']
            ];

            return true;
        } else{
            return false;
        }
    }
}
