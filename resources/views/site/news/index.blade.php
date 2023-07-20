@extends('form._hat')

@section('title')
    Главная страница
@endsection

@section('categoriesSelect')
    <div style="margin-left: 35%">
        <form action="" method="post">
            @csrf

            <div style="display: flex">
                <select name="category_name" style="margin-right: 10px; width: 30%" class="form-select" aria-label="Пример выбора по умолчанию">
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
@endsection

@section('content')
    <div id="w0" class="row g-4 py-5">
        @foreach($news as $news_values)

                <div class="feature col">
                    <h3 class="fs-2">{{$news_values->header}}</h3>

                    @foreach($categories as $category_values)
                        @if($news_values->id_categories == $category_values->id)
                            <p style="color: green">{{$category_values->name_of_category}}</p> <p>Дата подачи {{$news_values->date}}</p>
                        @endif
                    @endforeach

                    <p>{{$news_values->information}}</p>
                </div>

        @endforeach
    </div>

    <div align="center">
        {{$news->links()}}
    </div>
@endsection


