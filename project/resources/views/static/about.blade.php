@extends('layouts.app')

@section('page-title')
    {{ $title }}
@endsection

@section('content')
<h1>Страница про нас</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    Alias, animi dolorem esse excepturi, ipsam, iste laborum nisi
    officia qui quibusdam quidem similique totam. Dolor id obcaecati
    omnis qui quod voluptatem!</p>

    @if(count($params) > 0)
        <ul class = "list-group">
            @foreach($params as $el)
                <li class = "list-group-item">{{ $el }}</li>
            @endforeach

        </ul>
    @endif
@endsection




