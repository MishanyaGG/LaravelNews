@extends('form._hat')

@section('title')
    Подробнее
@endsection

@section('content')
    <h3 class="fs-2">{{$news->header}}</h3>
         @foreach($categories as $category_values)
             @if($news->id_categories == $category_values->id)
                 <p style="color: green">{{$category_values->name_of_category}}</p> <p>Дата подачи {{$news->date}}</p>
             @endif
         @endforeach

    <p>{{$news->information}}</p>
@endsection


