@extends('layouts.app')

@section('page-title')
    Обновление статьи
@endsection

@section('content')
    <h1>Обновление статьи</h1>
    {!! Form::open(['action' => ['ArticlesController@update',$article->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{ Form::label('title', 'Название статьи') }}
        {{ Form::text('title',$article->title, ['class' => 'form-control', 'placeholder' => 'Введите заголовок']) }}
    </div>
    <div class="form-group">
        {{ Form::label('text', 'Сама статья') }}
        {{ Form::textarea('text', $article->title, ['id' => 'app-ckeditor', 'placeholder' => 'Введите саму статью']) }}
    </div>
    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::file('main_image') }}
    <br>
    {{ Form::submit('Обновить', ['class' => 'btn btn-success']) }}
    <br><br>
    {!! Form::close() !!}
@endsection
