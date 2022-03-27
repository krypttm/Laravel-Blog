@extends('layouts.app')

@section('page-title')
    Все статьи на сайте
@endsection


@section('content')
        <h2> Все статьи на сайте</h2>

    @if(count($articles) > 0)
        @foreach($articles as $el)
            <div class="well">
                <img src="/public/storage/images/{{$el->image}}" style="max-width: 300px" class="img-thumbnail" alt="{{$el->title}}">
                <a href="/public/articles/{{$el->id}}">
                    <h3 class="mt-3">{{$el->title}}</h3>
                    <p>Последнее обновление {{$el->updated_at}}</p>
                    <p><b>Автор:</b> {{ $el->user->name }}</p>
                </a>
            </div>
        @endforeach
        <?php //{{$articles->links()}} ?>
    @else
        <p>На даный момент статей нет</p>
    @endif


@endsection


