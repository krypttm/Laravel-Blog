@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Кабинет пользователя</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($articles) > 0 )
                        @foreach($articles as $el)
                            <div class="alert alert-info">
                                <h4>{{ $el->title }}</h4>
                                <hr>
                                <a href="/public/articles/{{$el->id}}/edit" class="btn btn-info">Редактировать</a>
                                <br><br>
                                {!! Form::open(['action' => ['ArticlesController@destroy', $el->id], 'method' => 'POST']) !!}
                                {{ Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Удалить запись', ['class' =>'btn btn-danger'] )}}
                                {!! Form::close() !!}
                            </div>
                        @endforeach
                    @else
                        <p>У вас ещё нет статей</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
