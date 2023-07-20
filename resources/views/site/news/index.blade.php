@extends('form._hat')

@section('title')
    Главная страница
@endsection

@section('categoriesSelect')
    <div style="margin-left: 35%">
        <form action="" method="post">
            @csrf

            <div style="display: flex">
                <select name="category_name" onchange="onchancheCategory()" id="id_categories" style="margin-right: 10px; width: 30%" class="form-select" aria-label="Пример выбора по умолчанию">
                    <option selected disabled>Категории</option>
                    <!-- Перебираем -->
                    @foreach($categories as $category_values)
                        <option value="{{$category_values->id}}">{{$category_values->name_of_category}}</option>
                    @endforeach
                </select>
                <button class="btn btn-primary" type="submit">Поиск</button>
            </div>
        </form>
    </div>
    <div style="margin-left: 28%; margin-top: 10px">
        <a href="{{route('categoryCreate')}}"><button class="btn btn-success">Создать категорию</button></a>
        <a id="btnUpdate" class="btn btn-secondary" href="{{route('categoryUpdate')}}">Изменить категорию</a>
        <a id="btnDelete" class="btn btn-danger" href="{{route('categoryDelete')}}">Удалить категорию</a>
    </div>
@endsection

@section('content')
    <div id="w0" class="row g-4 py-5">
        @foreach($news as $news_values)

                <div class="feature col">
                    <h3 class="fs-2">{{$news_values->header}}</h3>

                    <p style="color: green">{{$news_values->categories->name_of_category}}</p> <p>Дата подачи {{$news_values->date}}</p>

                    <p>{{$news_values->information}}</p>

                    <a href="{{route('newsMore',$news_values->id)}}"><button class="btn btn-primary">Подробнее</button></a>
                    <a href="{{route('newsDelete',$news_values->id)}}"><button class="btn btn-danger">Удалить</button></a>
                    <a href="{{route('newsUpdate',$news_values->id)}}"><button class="btn btn-secondary">Изменить</button></a>
                </div>

        @endforeach
    </div>

    <div align="center">
        {{$news->links()}}
    </div>
@endsection


