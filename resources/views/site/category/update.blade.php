@extends('form._hat')

@section('title')
    Изменение новости
@endsection

@section('content')
    <h1>Изменение новости</h1>

    <form class="form" action="{{route('categoryUpdate',$categories->id)}}" method="post">
        @csrf

        <div class="form-group">
            <label for="header">Название категории</label>
            <input value="{{$categories->name_of_category}}" class="form-control" name="name_of_category" id="header" type="text">
        </div>

        <button style="width: 200px; margin-top: 10px" class="btn btn-success" type="submit">Создать</button>
    </form>
@endsection


