@extends('form._hat')

@section('title')
    Вход в аккаунт
@endsection

@section('content')
        @if($errors != false)
            <div class="alert alert-danger">
                {{$errors}}
            </div>
        @endif

    <h1>Вход</h1>

    <form class="form" action="{{route('login')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="header">Логин</label>
            <input class="form-control" name="login" id="header" type="text" required>
        </div>

        <div class="form-group">
            <label for="information">Пароль</label>
            <input class="form-control" name="password" id="header" type="text" required>
        </div>

        <button style="width: 200px; margin-top: 10px" class="btn btn-success" type="submit">Войти</button>
    </form>
@endsection


