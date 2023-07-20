@extends('form._hat')

@section('title')
    Создание новости
@endsection

@section('content')
    <h1>Создание новости</h1>

    <form class="form" action="{{route('newsCreate')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="header">Заголовок</label>
            <input class="form-control" name="header" id="header" type="text">
        </div>

        <div class="form-group">
            <label for="category">Категория новости</label>
            <select class="form-control" id="category" name="category">
                <option selected disabled>Выберите категорию</option>
                @foreach($categories as $categories_value)
                    <option value="{{$categories_value->id}}">{{$categories_value->name_of_category}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="information">Информация</label>
            <textarea style="resize: none" class="form-control" name="information" id="information" rows="6"></textarea>
        </div>

        <button style="width: 200px; margin-top: 10px" class="btn btn-success" type="submit">Создать</button>
    </form>
@endsection


