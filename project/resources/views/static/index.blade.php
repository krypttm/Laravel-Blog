@extends('layouts.app')

@section('page-title')
   {{ $title }}
@endsection


@section('content')
    <div class="alert alert-secondary text-center">
        <h1>Главная страница</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Alias, animi dolorem esse excepturi, ipsam, iste laborum nisi
            officia qui quibusdam quidem similique totam. Dolor id obcaecati
            omnis qui quod voluptatem!</p>
        <button class="btn btn-warning">Зарегистрироватся</button>
    </div>

@endsection

