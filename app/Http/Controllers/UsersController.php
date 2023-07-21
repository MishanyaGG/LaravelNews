<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller
{
    /**
     * Вход в аккаунт
     * @param Request $rq
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function login(Request $rq){

        if ($_POST == []){
            return view('site.users.login',[
                'errors'=>false
            ]);
        } else {
            $users = new Users();

            if($users->login($rq->all())){

                return redirect()->route('index');
            } else{
                return view('site.users.login',[
                    'errors'=>'Ошибка логина или пароля'
                ]);
            }
        }
    }

    /**
     * Выход из аккаунта
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logOut(){
        session_destroy();

        return redirect()->route('index');
    }
}
