@extends('form._hat')

@section('title')
    Создание новости
@endsection

@section('content')
    <h1>Создание новости</h1>

    <form class="form" action="{{route('categoryCreate')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="header">Название категории</label>
            <input class="form-control" name="name_of_category" id="header" type="text">
        </div>

        <button style="width: 200px; margin-top: 10px" class="btn btn-success" type="submit">Создать</button>
    </form>
@endsection


