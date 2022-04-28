@extends('layouts.app')

@section('page-title')
    Создание новой статьи
@endsection

@section('content')
    <h1>Создание новой статьи</h1>
    {!! Form::open(['action' => 'ArticlesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
            {{Form::label('title','Название статьи:')}}<br>
            {{Form::text('title', '',['class' => 'form-control','placeholder' =>'Введите заголовок'])}}
        </div>

    <div class="form-group">
        {{Form::label('text','Сама статья: ')}}<br>
        {{Form::textarea('text', '',['class' => 'form-control','id' => 'app-ckeditor','placeholder' =>'Введите статью'])}}
    </div>
<br>

        {{ Form::file('main_image') }}
    <br><br>
        {{ Form::submit('Добавить',['class' => 'btn btn-success']) }}

    {!! Form::close() !!}
@endsection





